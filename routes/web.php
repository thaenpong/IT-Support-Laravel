<?php

use Illuminate\Support\Facades\Route;
use app\http\Controllers\repair_ctl;
use App\Http\Controllers\registration_ctl;
use App\Http\Controllers\employee_ctl;
use App\Http\Controllers\department_ctl;
use App\Models\request_repair as req_repair;
use App\Models\department;
use App\Models\employee;
use App\Models\registration;
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
    $data = registration::all();
    $emp = employee::all();
    return view('welcome')->with('data', $data)->with('emp', $emp);
})->name('index');

<<<<<<< HEAD
<<<<<<< HEAD
Route::post('/request', function (Request $request) {
    $emp = employee::select('id')->where('name', $request->name)->first();
    //dd($emp->id);
    $req = new req_repair();
    $req->emp_id = $emp->id;
    $req->regis_id = $request->res_id;
    $req->emp_behave = $request->behave;
    $req->save();
    return redirect()->route('index');
})->name('request_repair');

=======
>>>>>>> parent of de52926 (add migrate request_repair)
=======
>>>>>>> parent of de52926 (add migrate request_repair)
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

    Route::get('/repair', [repair_ctl::class, 'new'])->name('repair');
});
