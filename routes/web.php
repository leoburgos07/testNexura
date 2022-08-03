<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [EmployeeController::class, 'index']);

// Route::match(array('GET', 'POST'), [EmployeeController])

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('createEmployee', [EmployeeController::class,'create'])->name('createEmployee');
    route::get('editEmployee', [EmployeeController::class,'edit'])->name('editEmployee');
    route::delete('deleteEmployee/{employee}', [EmployeeController::class,'destroy'])->name('deleteEmployee');
    route::post('storeEmployee', [EmployeeController::class,'store'])->name('storeEmployee');
});
