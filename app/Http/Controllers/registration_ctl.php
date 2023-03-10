<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

use App\Models\registration;
use App\Models\property_key;
use App\Models\employee;
use App\Models\unregistration;
use App\Models\registration_user_log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exports\Registration_Export;
use App\Models\request_repair;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;


class registration_ctl extends Controller
{
    protected $fpdf;


    public function index($key, Request $request)
    {
        if ($key == 'all') {
            $registration = registration::all();
        } else {
            $registration = registration::where('property_id', $key)->get();
        }
        $property_key = property_key::all();
        $property_defualt = property_key::all()->where('id', $key);
        $employee = employee::all();
        return view('registration.index', compact('property_key', 'registration', 'property_defualt'));
        //------------------------------------------------------------------------------------------
        /**$articles = registration::when($request->has("property_code"), function ($q) use ($request) {
            return $q->where("property_code", "like", "%" . $request->get("property_code") . "%");
        })->paginate(5);
        if ($request->ajax()) {
            return view('registration.test', ['articles' => $articles]);
        }
        return view('registration.test', ['articles' => $articles]);**/
        //------------------------------------------------------------------------------------------

    }
    public function new()
    {
        $employee = employee::all();
        $property_key = property_key::all();

        return view('registration.new', compact('property_key', 'employee'));
    }

    public function get_code($id)
    {
        $data = registration::select('property_code')->where('property_id', $id)->orderby('id', 'DESC')->first();
        echo $data;
    }

    public function new_post(Request $request)
    {
        $request->validate([
            'property_code' => 'required|max:8'
        ]);


        $registration = new registration;
        $registration->property_id = $request->property_id;
        $registration->property_code = $request->property_code;
        $registration->serial_number = $request->serial_number;
        $registration->brand = $request->brand;
        $registration->type = $request->type;
        $registration->spec = $request->spec;
        $registration->color = $request->color;
        $registration->refer = $request->refer;
        $registration->user_id = $request->user_id;
        $registration->admin_id = Auth::user()->id;
        $registration->save();

        $id = $registration->id;
        //dd($id);
        $logupdate = new registration_user_log;
        $logupdate->registration_id = $id;
        $logupdate->user_id = $request->user_id;
        $logupdate->in_admin = Auth::user()->id;
        $logupdate->save();
        return redirect()->route('registration_detail', ['id' => $id]);
    }

    public function edit($id)
    {
        $registration = registration::withTrashed()->find($id);
        $employee = employee::all();
        $property_key = property_key::all();

        return view('registration.edit', compact('property_key', 'employee', 'registration'));
    }

    public function update(Request $request, $id)
    {
        //$registration = registration::withTrashed()->find($id);
        //if ($request->user_id != $registration->user_id) {
        /**
        $logupdate = new registration_user_log;
        $logupdate->registration_id = $id;
        $logupdate->user_id = $request->user_id;
        $logupdate->in_admin = Auth::user()->id;
        $logupdate->save();
        }  */

        $check  = registration_user_log::where('registration_id', $id)->orderby('id', 'desc')->first();
        //dd($check);
        if ($check != null) {
            if ($check->user_id != $request->user_id) {

                registration_user_log::find($check->id)->update(['out_admin' => Auth::user()->id]);
                registration_user_log::where('registration_id', $id)->delete();
                $logupdate = new registration_user_log;
                $logupdate->registration_id = $id;
                $logupdate->user_id = $request->user_id;
                $logupdate->in_admin = Auth::user()->id;
                $logupdate->save();
            }
        } else {
            $logupdate = new registration_user_log;
            $logupdate->registration_id = $id;
            $logupdate->user_id = $request->user_id;
            $logupdate->in_admin = Auth::user()->id;
            $logupdate->save();
        }

        registration::find($id)->update([
            'property_id' => $request->property_id,
            'property_code' => $request->property_code,
            'serial_number' => $request->serial_number,
            'brand' => $request->brand,
            'type' => $request->type,
            'spec' => $request->spec,
            'color' => $request->color,
            'refer' => $request->refer,
            'user_id' => $request->user_id
        ]);
        return redirect()->route('registration_detail', ['id' => $id]);
    }

    public function detail($id)
    {
        $registration = registration::withTrashed()->find($id);
        $logs = registration_user_log::withTrashed()->where('registration_id', $id)->orderby('id', 'desc')->get();
        $logs_re = request_repair::withTrashed()->where('regis_id', $id)->orderby('id', 'desc')->get();

        return view('registration.detail', compact('registration', 'logs', 'logs_re'));
    }

    public function unregis(Request $request, $id)
    {

        registration::find($id)->update([
            'user_id' => '1',
            'refer' => $request->refer
        ]);
        $check = unregistration::select('number', 'created_at')->orderBy('id', 'DESC')->first();


        //dd($check);
        if ($check == null) {

            //dd($emp->id);
            $unregis = new unregistration;
            $unregis->number = '1';
            $unregis->registration_id = $id;
            $unregis->user_id = Auth::user()->id;
            $unregis->cause = $request->refer;
            $unregis->save();
        } else {

            $d = $check->created_at->format('y');
            $nd = date('y');
            if ($d == $nd) {
                $number = $check->number + 1;
                $unregis = new unregistration;
                $unregis->number = $number;
                $unregis->registration_id = $id;
                $unregis->user_id = Auth::user()->id;
                $unregis->cause = $request->refer;
                $unregis->save();
            } else {
                $unregis = new unregistration;
                $unregis->number = '1';
                $unregis->registration_id = $id;
                $unregis->user_id = Auth::user()->id;
                $unregis->cause = $request->refer;
                $unregis->save();
            }
        }
        //echo $fpdf_d;
        registration::find($id)->delete();
        return redirect()->route('registration_detail', ['id' => $id]);
    }

    public function unregistration($key)
    {

        if ($key == 'all') {
            $registration = registration::onlyTrashed()->get();
        } else {
            $registration = registration::onlyTrashed()->get()->where('property_id', $key);
        }
        $property_key = property_key::all();
        $property_defualt = property_key::all()->where('id', $key);
        $employee = employee::all();
        //dd($employee->id);
        return view('registration.unregistration', compact('property_key', 'registration', 'property_defualt'));
    }

    public function unregispdf($id)
    {
        $data = unregistration::all()->where('registration_id', $id)->first();
        //dd($data->registration->id);

        //echo $data->id;
        define('FPDF_FONTPATH', public_path('fonts/'));

        $fpdf = new FPDF('P', 'mm', 'A4');
        $fpdf->AddPage();
        $fpdf->Image(storage_path('file\IT-P001 F06.jpg'), 0, 0, 210, 297);

        $fpdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $fpdf->SetFont('THSarabunNew', '', 16);
        $fpdf->SetX(176);
        $fpdf->Cell(250, 10, $data->number);
        $fpdf->SetX(184);
        $fpdf->Cell(250, 10, iconv('UTF-8', 'cp874', $data->created_at->thaidate('y')));
        $fpdf->SetX(75);
        $fpdf->Cell(250, 58, $data->created_at);
        $fpdf->SetX(75);
        $fpdf->Cell(250, 80, $data->registration->property_key->key . "" . $data->registration->property_code);
        $fpdf->SetX(75);
        $fpdf->Cell(250, 102, $data->registration->brand);
        $fpdf->SetX(75);
        $fpdf->Cell(250, 123, $data->registration->spec);
        $fpdf->SetX(75);
        $fpdf->Cell(250, 146, $data->registration->serial_number);
        $fpdf->SetX(75);
        $fpdf->Cell(250, 168, iconv('UTF-8', 'cp874', $data->cause));
        $fpdf->SetX(40);
        $fpdf->Cell(250, 207, iconv('UTF-8', 'cp874', $data->user->name));
        $fpdf->Output();
        //$fpdf->Output('D', 'Test.pdf');
        exit;
    }

    public function export()
    {
        return Excel::download(new Registration_Export, 'ทะเบียนทรัพสิน.xlsx');
    }

    public function new_property(Request $request)
    {
        $table = new property_key;
        $table->key = $request->key;
        $table->name = $request->name;
        $table->save();

        return redirect()->route('registration', ['key' => 'all']);
    }

    public function swap_get(Request $request)
    {
        $data = registration::select('id', 'property_code', 'property_id')->get();
        $err = '1';
        return view('registration.swap', compact('data', 'err'));
    }

    public function swap_post(Request $request)
    {

        //dd($request);
        $prop_key01 = substr($request->property01, 0, 3);
        $prop_code01 = substr($request->property01, 3);
        $prop_id01 = property_key::select('id')->where('key', $prop_key01)->first();
        $id01 = registration::select('id', 'user_id')->where('property_id', $prop_id01->id)->where('property_code', $prop_code01)->first();


        $prop_key01 = substr($request->property02, 0, 3);
        $prop_code02 = substr($request->property02, 3);
        $prop_id02 = property_key::select('id')->where('key', $prop_key01)->first();
        $id02 = registration::select('id', 'user_id')->where('property_id', $prop_id02->id)->where('property_code', $prop_code02)->first();
        //dd($id02->user_id);

        if ($id02->id != $id01->id) {
            //หาdatabase log
            $check01  = registration_user_log::where('registration_id', $id01->id)->orderby('id', 'desc')->first();
            $check02  = registration_user_log::where('registration_id', $id02->id)->orderby('id', 'desc')->first();
            //dd($check01);
            //ลบ log 01
            registration_user_log::find($check01->id)->update(['out_admin' => Auth::user()->id]);
            registration_user_log::where('registration_id', $id01->id)->delete();
            //ลบ log 02
            registration_user_log::find($check02->id)->update(['out_admin' => Auth::user()->id]);
            registration_user_log::where('registration_id', $id02->id)->delete();
            //สลับ user_id
            registration::find($id01->id)->update(['user_id' => $id02->user_id]);
            registration::find($id02->id)->update(['user_id' => $id01->user_id]);
            //update log
            $logupdate = new registration_user_log;
            $logupdate->registration_id = $id01->id;
            $logupdate->user_id = $id02->user_id;
            $logupdate->in_admin = Auth::user()->id;
            $logupdate->save();

            $logupdate = new registration_user_log;
            $logupdate->registration_id = $id02->id;
            $logupdate->user_id = $id01->user_id;
            $logupdate->in_admin = Auth::user()->id;
            $logupdate->save();
            //
            return redirect()->route('registration_swap_get');
        } else {
            $data = registration::select('id', 'property_code', 'property_id')->get();
            $err = '2';
            return view('registration.swap', compact('data', 'err'));
        }
    }
}
