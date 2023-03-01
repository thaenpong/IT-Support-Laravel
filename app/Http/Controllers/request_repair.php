<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\registration;
use app\models\employee;
//use app\models\request_repair as request_repairmodel;

class request_repair extends Controller
{
    public function index()
    {
        return view('repair.index');
    }
}
