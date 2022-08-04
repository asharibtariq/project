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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('ajax_content', [\App\Http\Controllers\AjaxController::class, 'content']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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