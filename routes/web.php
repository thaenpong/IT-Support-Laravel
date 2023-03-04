<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\repair_ctl;
use App\Http\Controllers\registration_ctl;
use App\Http\Controllers\employee_ctl;
use App\Http\Controllers\department_ctl;
use App\Models\request_repair as req_repair;
use App\Models\department;
use App\Models\employee;
use App\Models\registration;
use App\Models\request_repair;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = registration::all('id', 'type', 'property_id', 'property_code', 'user_id', 'refer');
    $emp = employee::all('name');
    $repair = request_repair::all('emp_id', 'regis_id', 'emp_behave', 'created_at', 'st', 'admin_id');
    return view('welcome')->with('data', $data)->with('emp', $emp)->with('repair', $repair);
})->name('index');


Route::post('/request', function (Request $request) {
    try {
        $emp = employee::select('id')->where('name', $request->name)->first();

        //dd($emp->id);
        $req = new req_repair();
        $req->emp_id = $emp->id;
        $req->regis_id = $request->res_id;
        $req->emp_behave = $request->behave;
        $req->st = '1';
        $req->save();

        $data = registration::all('id', 'type', 'property_id', 'property_code', 'user_id', 'refer');
        $emp = employee::all('name');
        $repair = request_repair::all('emp_id', 'regis_id', 'emp_behave', 'created_at', 'st', 'admin_id');
        return view('welcome')->with('data', $data)->with('emp', $emp)->with('repair', $repair)->with('err', '1');
    } catch (\Exception $e) {


        $data = registration::all('id', 'type', 'property_id', 'property_code', 'user_id', 'refer');
        $emp = employee::all('name');
        $repair = request_repair::all('emp_id', 'regis_id', 'emp_behave', 'created_at', 'st', 'admin_id');
        return view('welcome')->with('data', $data)->with('emp', $emp)->with('repair', $repair)->with('err', '2');
    }
})->name('request_repair');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Registration
    Route::get('/registration/view/{key}', [registration_ctl::class, 'index'])->name('registration');
    Route::get('/registration/new/', [registration_ctl::class, 'new'])->name('registration_new');
    Route::post('/registration/new/', [registration_ctl::class, 'new_post'])->name('registration_new_post');
    Route::get('/registration/edit/{id}', [registration_ctl::class, 'edit'])->name('registration_edit');
    Route::post('/registration/edit/{id}', [registration_ctl::class, 'update'])->name('registration_edit_post');
    Route::get('/registration/unregistration/{id}', [registration_ctl::class, 'unregistraion'])->name('registration_unregistration');
    Route::get('/registration/detail/{id}', [registration_ctl::class, 'detail'])->name('registration_detail');
    Route::post('/registration/unregis/{id}', [registration_ctl::class, 'unregis'])->name('registration_unregis');
    Route::get('/registration/view/unregistration/{key}', [registration_ctl::class, 'unregistration'])->name('unregistration');
    Route::get('/registration/unregispdf/{id}', [registration_ctl::class, 'unregispdf'])->name('unregispdf');
    Route::get('/registration/export', [registration_ctl::class, 'export'])->name('registration_export');
    //Employee
    Route::get('/employee', [employee_ctl::class, 'index'])->name('employee');
    Route::post('/employee/new', [employee_ctl::class, 'new'])->name('employee_new');
    Route::get('/employee/delete/{id}', [employee_ctl::class, 'delete'])->name('employee_delete');
    Route::get('/employee/detail/{id}', [employee_ctl::class, 'detail'])->name('employee_detail');


    //Department
    Route::post('/department/new', [department_ctl::class, 'new'])->name('department_new');
    Route::get('/department/delete/{id}', [department_ctl::class, 'delete'])->name('department_delete');

    //repair
    Route::get('/repair', [repair_ctl::class, 'index'])->name('repair');
    Route::get('/repair/detial/{id}', [repair_ctl::class, 'detail'])->name('repair_detail');
    Route::get('/repair/accept/{id}', [repair_ctl::class, 'accept'])->name('repair_accept');
    Route::get('/repair/own', [repair_ctl::class, 'ownrepair'])->name('ownrepair');
    Route::get('/repair/all', [repair_ctl::class, 'allrepair'])->name('allrepair');
    Route::post('/repair/donerepair/{id}', [repair_ctl::class, 'donerepair'])->name('donerepair');
    Route::get('/repair/delete/{id}', [repair_ctl::class, 'delete_re'])->name('delete_re');
    Route::get('/repair/download/{id}', [repair_ctl::class, 'download'])->name('download');
});
