<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StaffController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/userdata', [EmployeeController::class, 'userdata'])->name('userdata');
Route::get('/employee', [EmployeeController::class, 'list'])->name('employee');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class,'store'])->name('employee.store');
Route::get('/employee/show/{id}', [EmployeeController::class,'show'])->name('employee.show');
Route::get('/employee/destroy/{id}', [EmployeeController::class,'destroy'])->name('employee.destroy');
Route::get('/employee/edit/{id}', [EmployeeController::class,'edit'])->name('employee.edit');
Route::post('/employee/update/{id}', [EmployeeController::class,'update'])->name('employee.update');
Route::get('/tabledata', [EmployeeController::class, "getData"])->name('tabledata');
Route::get('/staff', [StaffController::class, 'stafflist'])->name('staff');



});



