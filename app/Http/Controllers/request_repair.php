<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\registration;
use app\Models\employee;

class request_repair extends Controller
{
    public function request_repair(Request $request)
    {

        return redirect()->route('index');
    }
}
