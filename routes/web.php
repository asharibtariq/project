<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::post('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);

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

// Designation Routes
Route::get('designation', [\App\Http\Controllers\DesignationController::class, 'index']);
Route::get('add_designation', [\App\Http\Controllers\DesignationController::class, 'create']);
Route::post('add_designation', [\App\Http\Controllers\DesignationController::class, 'store']);
Route::get('designation/{id}', [\App\Http\Controllers\DesignationController::class, 'show']);
Route::get('edit_designation/{id}', [\App\Http\Controllers\DesignationController::class, 'edit']);
Route::post('update_designation/{id}', [\App\Http\Controllers\DesignationController::class, 'update']);
Route::get('delete_designation/{id}', [\App\Http\Controllers\DesignationController::class, 'destroy']);

// Executive Agency Routes
Route::get('executiveagency', [\App\Http\Controllers\ExecutiveAgencyController::class, 'index']);
Route::get('add_executiveagency', [\App\Http\Controllers\ExecutiveAgencyController::class, 'create']);
Route::post('add_executiveagency', [\App\Http\Controllers\ExecutiveAgencyController::class, 'store']);
Route::get('executiveagency/{id}', [\App\Http\Controllers\ExecutiveAgencyController::class, 'show']);
Route::get('edit_executiveagency/{id}', [\App\Http\Controllers\ExecutiveAgencyController::class, 'edit']);
Route::post('update_executiveagency/{id}', [\App\Http\Controllers\ExecutiveAgencyController::class, 'update']);
Route::get('delete_executiveagency/{id}', [\App\Http\Controllers\ExecutiveAgencyController::class, 'destroy']);

// Component Routes
Route::get('component', [\App\Http\Controllers\ComponentController::class, 'index']);
Route::get('add_component', [\App\Http\Controllers\ComponentController::class, 'create']);
Route::post('add_component', [\App\Http\Controllers\ComponentController::class, 'store']);
Route::get('component/{id}', [\App\Http\Controllers\ComponentController::class, 'show']);
Route::get('edit_component/{id}', [\App\Http\Controllers\ComponentController::class, 'edit']);
Route::post('update_component/{id}', [\App\Http\Controllers\ComponentController::class, 'update']);
Route::get('delete_component/{id}', [\App\Http\Controllers\ComponentController::class, 'destroy']);

// Organization Routes
Route::get('organization', [\App\Http\Controllers\OrganizationController::class, 'index']);
Route::get('add_organization', [\App\Http\Controllers\OrganizationController::class, 'create']);
Route::post('add_organization', [\App\Http\Controllers\OrganizationController::class, 'store']);
Route::get('organization/{id}', [\App\Http\Controllers\OrganizationController::class, 'show']);
Route::get('edit_organization/{id}', [\App\Http\Controllers\OrganizationController::class, 'edit']);
Route::post('update_organization/{id}', [\App\Http\Controllers\OrganizationController::class, 'update']);
Route::get('delete_organization/{id}', [\App\Http\Controllers\OrganizationController::class, 'destroy']);

// Tabs Routes
Route::get('add_project_director', [\App\Http\Controllers\ProjectController::class, 'project_director']);
Route::post('add_project_director', [\App\Http\Controllers\ProjectController::class, 'add_project_director']);

Route::get('add_project_allocation', [\App\Http\Controllers\ProjectController::class, 'allocation']);
Route::post('add_project_allocation', [\App\Http\Controllers\ProjectController::class, 'add_allocation']);

Route::get('add_release', [\App\Http\Controllers\ProjectController::class, 'release']);
Route::post('add_release', [\App\Http\Controllers\ProjectController::class, 'add_release']);

