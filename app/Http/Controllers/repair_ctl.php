<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\registration;
use App\models\employee;
use App\models\request_repair;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Storage;

class repair_ctl extends Controller
{
    public function index()
    {
        $data = request_repair::where('admin_id', null)->get();
        return view('repair.index')->with('data', $data);
    }

    public function detail(Request $request, $id)
    {
        $admin = Auth::user()->id;
        $data = request_repair::where('id', $id)->withTrashed()->get()->first();
        return view('repair.detail')->with('data', $data)->with('admin', $admin);
    }

    public function accept($id)
    {
        $repair = request_repair::find($id);
        $repair->admin_id = Auth::user()->id;
        $repair->admin_date = now();
        $repair->st = '2';
        $repair->update();

        return redirect()->route('repair_detail', ['id' => $id]);
    }

    public function ownrepair()
    {
        $data = request_repair::where('admin_id', Auth::user()->id)->get();
        return view('repair.ownrepair')->with('data', $data);
    }

    public function allrepair()
    {
        $data = request_repair::withTrashed()->orderBy('created_at', 'desc')->get();
        return view('repair.allrepair')->with('data', $data);
    }

    public function donerepair(Request $request, $id)
    {


        $repair = request_repair::find($id);
        $repair->st_be = $request->st_be;
        $repair->st_af = $request->st_af;
        $repair->admin_behave = $request->admin_behave;
        $repair->st = '3';
        $repair->update();

        request_repair::find($id)->delete();
        //$repair->st_be = $request->st_be;
        //$repair->save();
        return redirect()->route('repair_detail', ['id' => $id]);
    }

    public function delete_re($id)
    {
        $repair = request_repair::find($id);
        $repair->st = '4';
        $repair->update();

        request_repair::find($id)->delete();

        return redirect()->route('repair_detail', ['id' => $id]);
    }

    public function download($id)
    {
        $checkmark = "✔";
        //dd($checkmark);
        $data = request_repair::withTrashed()->find($id);
        define('FPDF_FONTPATH', public_path('fonts/'));
        $fpdf = new FPDF('P', 'mm', 'A4');
        $fpdf->AddPage();
        $fpdf->Image(storage_path('file\IT-P001 F04.png'), 0, 0, 210, 297);
        $fpdf->SetX(75);
        $fpdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $fpdf->SetFont('THSarabunNew', '', 16);
        //---------------------------------------------------------------- User
        $fpdf->SetX(27);
        $fpdf->Cell(250, 42, $data->created_at->format('d'));
        $fpdf->SetX(35);
        $fpdf->Cell(250, 42, iconv('UTF-8', 'cp874', $data->created_at->thaidate('M')));
        $fpdf->SetX(45);
        $fpdf->Cell(250, 42, iconv('UTF-8', 'cp874', $data->created_at->thaidate('Y')));
        $fpdf->SetX(97);
        $fpdf->Cell(250, 42, $data->created_at->format('h'));
        $fpdf->SetX(107);
        $fpdf->Cell(250, 42, $data->created_at->format('i'));
        $fpdf->SetX(35);
        $fpdf->Cell(250, 68, $data->regis->property_key->key . "" . $data->regis->property_code);
        $fpdf->SetX(35);
        $fpdf->Cell(250, 82, iconv('UTF-8', 'cp874', $data->emp_behave));
        $fpdf->SetX(35);
        $fpdf->Cell(250, 108, iconv('UTF-8', 'cp874', $data->emp->name));
        $fpdf->SetX(112);
        $fpdf->Cell(250, 108, iconv('UTF-8', 'cp874', $data->emp->department->name));

        //----------------------------------------------------------------- admin
        $fpdf->SetX(33);
        $fpdf->Cell(250, 146, $data->created_at->format('d'));
        $fpdf->SetX(43);
        $fpdf->Cell(250, 146, iconv('UTF-8', 'cp874', Carbon::parse($data->createadd_at)->thaidate('M')));
        $fpdf->SetX(53);
        $fpdf->Cell(250, 146, iconv('UTF-8', 'cp874', Carbon::parse($data->created_at)->thaidate('Y')));
        $fpdf->SetX(98);
        $fpdf->Cell(250, 146, iconv('UTF-8', 'cp874', Carbon::parse($data->createadd_at)->thaidate('h')));
        $fpdf->SetX(108);
        $fpdf->Cell(250, 146, iconv('UTF-8', 'cp874', Carbon::parse($data->created_at)->thaidate('i')));
        if ($data->st_be == '1') {
            $fpdf->SetX(53);
            $fpdf->Image(storage_path('file\check.png'), 37, 87, 5, 5);
        } elseif ($data->st_af == '2') {
            $fpdf->SetX(53);
            $fpdf->Image(storage_path('file\check.png'), 37, 94, 5, 5);
        }
        if ($data->st_be == '1') {
            $fpdf->SetX(53);
            $fpdf->Image(storage_path('file\check.png'), 100, 87, 5, 5);
        } elseif ($data->st_af == '2') {
            $fpdf->SetX(53);
            $fpdf->Image(storage_path('file\check.png'), 100, 94, 5, 5);
        }
        $fpdf->SetX(35);
        $fpdf->Cell(250, 187, iconv('UTF-8', 'cp874', $data->admin_behave));

        $fpdf->Output();
        exit;
    }
}
