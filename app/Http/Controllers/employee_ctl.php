<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\employee;
use App\Models\property_key;
use App\Models\registration;

class employee_ctl extends Controller
{
    public function index()
    {
        $department = department::paginate(5, ['*'], 'department');
        $employee = employee::paginate(5, ['*'], 'employee');
        $department_select = department::all();
        return view('employee.index', compact('department', 'employee', 'department_select'));
    }

    public function new(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'nick_name' => 'required|max:15',
            'department_id' => 'required'
        ]);

        $employee = new employee;
        $employee->name = $request->name;
        $employee->nick_name = $request->nick_name;
        $employee->department_id = $request->department_id;
        $employee->save();
        return redirect()->route('employee');
    }

    public function delete($id)
    {
        registration::where('user_id', $id)
            ->update([
                'user_id' => '1'
            ]);
        employee::find($id)->delete();
        return back();
    }
    public function detail($id)
    {
        $emp = employee::withTrashed()->find($id);
        $regis = registration::all()->where('user_id', $id);
        return view('employee.detail', compact('emp', 'regis'));
    }
}
