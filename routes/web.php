<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController as FrontendIndexController;
use App\Http\Controllers\Backend\IndexController as BackendIndexController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\TeamController;


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

Auth::routes();
Route::get('/', [FrontendIndexController::class , 'index'])->name('frontend.index');

Route::group(['prefix' => 'management', 'middleware' => 'auth', 'name' => 'management.'], function () {
    Route::get('/', [BackendIndexController::class , 'index']);
    
    Route::resource('/employee', EmployeeController::class);
    Route::get('/employee/{id}/add-to/{organization}', [EmployeeController::class, 'showAddToOrganization'])->name('employee.addto.show');
    Route::post('/employee/{id}/add-to/{organization}', [EmployeeController::class, 'addToOrganization'])->name('employee.addto');

    Route::resource('/division', DivisionController::class);
    Route::resource('/department', DepartmentController::class);
    Route::resource('/team', TeamController::class);
});








