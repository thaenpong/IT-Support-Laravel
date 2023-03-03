<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\registration;
use App\models\employee;
use App\models\request_repair;

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
}
