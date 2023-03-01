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
        $data = request_repair::where('id', $id)->withTrashed()->get()->first();
        return view('repair.detail')->with('data', $data);
    }

    public function accept($id)
    {
        $repair = request_repair::find($id);
        $repair->admin_id = Auth::user()->id;
        $repair->admin_date = now();
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
        $data = request_repair::withTrashed()->get();
        return view('repair.allrepair')->with('data', $data);
    }

    public function donerepair(Request $request, $id)
    {
        //dd($id);
        //dd($request);
        request_repair::find($id)->update([
            'st_be' => $request->st_be,
            'st_af' => $request->st_af,
            'admin_behave' => $request->admin_behave,
        ]);
        request_repair::find($id)->delete();
        //$repair->st_be = $request->st_be;
        //$repair->save();
        return redirect()->route('repair_detail', ['id' => $id]);
    }
}
