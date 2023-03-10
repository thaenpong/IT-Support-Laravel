<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\employee;
use App\Models\property_key;
use App\Models\registration;
use App\Models\request_repair;

class employee_ctl extends Controller
{
    public function index()
    {
        $department = department::paginate(5, ['*'], 'department');
        $employee = employee::where('st', '1')->paginate(5, ['*'], 'employee');
        $department_select = department::all();
        return view('employee.index', compact('department', 'employee', 'department_select'));
    }

    public function new(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'nick_name' => 'required|max:15',
            'department_id' => 'required',

        ]);

        $employee = new employee;
        $employee->name = $request->name;
        $employee->nick_name = $request->nick_name;
        $employee->department_id = $request->department_id;
        $employee->st = '1';
        $employee->save();

        return redirect()->route('employee');
    }

    public function delete($id)
    {
        registration::where('user_id', $id)
            ->update([
                'user_id' => '1'
            ]);
        employee::where('id', $id)->update(['st' => '2']);
        return back();
    }
    public function detail($id)
    {
        $emp = employee::withTrashed()->find($id);
        $regis = registration::all()->where('user_id', $id);
        $logs_re = request_repair::withTrashed()->where('emp_id', $id)->orderby('id', 'desc')->get();
        return view('employee.detail', compact('emp', 'regis', 'logs_re'));
    }

    public function edit($id, Request $request)
    {
        //dd($request);
        employee::where('id', $id)->update([
            'name' => $request->name,
            'nick_name' => $request->nick_name,
            'department_id' => $request->depart_id
        ]);
        return redirect()->route('employee');
    }
}
