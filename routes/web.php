<?php

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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();
Route::post('ajax_content', [\App\Http\Controllers\AjaxController::class, 'content']);
Route::post('ajax_date_rec', [\App\Http\Controllers\AjaxController::class, 'getDateRecord']);
Route::post('ajax_check_date_rec', [\App\Http\Controllers\AjaxController::class, 'checkDateRecord']);
Route::post('ajax_expenditure_list', [\App\Http\Controllers\AjaxController::class, 'getActualExpenditure']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::post('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);

// User Routes
Route::get('user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('add_user', [\App\Http\Controllers\UserController::class, 'create']);
Route::post('add_user', [\App\Http\Controllers\UserController::class, 'store']);
Route::get('user/{id}', [\App\Http\Controllers\UserController::class, 'show']);
Route::get('edit_user/{id}', [\App\Http\Controllers\UserController::class, 'edit']);
Route::post('update_user/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::get('delete_user/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

// Project Routes
Route::get('project', [\App\Http\Controllers\ProjectController::class, 'index']);
Route::get('add_project', [\App\Http\Controllers\ProjectController::class, 'create']);
Route::post('add_project', [\App\Http\Controllers\ProjectController::class, 'store']);
Route::get('project/{id}', [\App\Http\Controllers\ProjectController::class, 'show']);
Route::get('edit_project/{id}', [\App\Http\Controllers\ProjectController::class, 'edit']);
Route::post('update_project/{id}', [\App\Http\Controllers\ProjectController::class, 'update']);
Route::get('delete_project/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy']);

// Report Routes
Route::get('report', [\App\Http\Controllers\ReportController::class, 'index']);
Route::get('add_report', [\App\Http\Controllers\ReportController::class, 'create']);
Route::post('add_report', [\App\Http\Controllers\ReportController::class, 'store']);
Route::get('report/{id}', [\App\Http\Controllers\ReportController::class, 'show']);
Route::get('edit_report/{id}', [\App\Http\Controllers\ReportController::class, 'edit']);
Route::post('update_report/{id}', [\App\Http\Controllers\ReportController::class, 'update']);
Route::get('delete_report/{id}', [\App\Http\Controllers\ReportController::class, 'destroy']);

// Report Log Routes
Route::get('report_log', [\App\Http\Controllers\LogController::class, 'index']);
