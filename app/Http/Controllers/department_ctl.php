<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;

class department_ctl extends Controller
{
    public function new(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments|max:15'
        ]);

        $department = new department;
        $department->name = $request->name;
        $department->save();

        return redirect()->route('employee');
    }

    public function delete($id)
    {
        $department = department::find($id)->delete();
        return redirect()->route('employee');
    }

    public function edit($id, Request $request)
    {
        department::where('id', $id)->update(['name' => $request->depart_name]);
        return redirect()->route('employee');
    }
}
