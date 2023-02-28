<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registration_ctl;
use App\Http\Controllers\employee_ctl;
use App\Http\Controllers\department_ctl;
use App\Http\Controllers\request_repair;
use App\Models\department;
use App\Models\employee;
use App\Models\registration;
use Laravel\Jetstream\Rules\Role;

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

Route::post('/request', [request_repair::class, 'request_repair'])->name('request_repair');

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
});
