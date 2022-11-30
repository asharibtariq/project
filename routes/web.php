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
Route::post('ajax_project_content', [\App\Http\Controllers\AjaxController::class, 'project_details_content']);
Route::post('ajax_physical_target_content', [\App\Http\Controllers\AjaxController::class, 'physical_target_content']);
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

// Project Profile Routes
Route::get('add_project_director/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'project_director']);
Route::post('add_project_director', [\App\Http\Controllers\ProjectProfileController::class, 'add_project_director']);
Route::get('edit_project_director/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_project_director']);
Route::post('update_project_director/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_project_director']);

Route::get('add_project_allocation/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'allocation']);
Route::post('add_project_allocation', [\App\Http\Controllers\ProjectProfileController::class, 'add_allocation']);
Route::get('edit_allocation/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_allocation']);
Route::post('update_allocation/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_allocation']);

Route::get('add_release/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'release']);
Route::post('add_release', [\App\Http\Controllers\ProjectProfileController::class, 'add_release']);
Route::get('edit_release/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_release']);
Route::post('update_release/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_release']);

Route::get('add_component_pc1/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'component_pc1']);
Route::post('add_component_pc1', [\App\Http\Controllers\ProjectProfileController::class, 'add_component_pc1']);
Route::get('edit_component_pc1/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_component_pc1']);
Route::post('update_component_pc1/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_component_pc1']);

Route::get('add_component_nis/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'component_nis']);
Route::post('add_component_nis', [\App\Http\Controllers\ProjectProfileController::class, 'add_component_nis']);
Route::get('edit_component_nis/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_component_nis']);
Route::post('update_component_nis/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_component_nis']);

Route::get('add_fy_util/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'fy_util']);
Route::post('add_fy_util', [\App\Http\Controllers\ProjectProfileController::class, 'add_fy_util']);
Route::get('edit_fy_util/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_fy_util']);
Route::post('update_fy_util/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_fy_util']);

Route::get('add_physical_target/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'physical_target']);
Route::post('add_physical_target', [\App\Http\Controllers\ProjectProfileController::class, 'add_physical_target']);
Route::get('edit_physical_target/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_physical_target']);
Route::post('update_physical_target/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_physical_target']);

Route::get('add_pc4/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'pc4']);
Route::post('add_pc4', [\App\Http\Controllers\ProjectProfileController::class, 'add_pc4']);
Route::get('edit_pc4/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_pc4']);
Route::post('update_pc4/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_pc4']);

Route::get('add_end_of_fy/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'end_of_fy']);
Route::post('add_end_of_fy', [\App\Http\Controllers\ProjectProfileController::class, 'add_end_of_fy']);
Route::get('edit_end_of_fy/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'edit_end_of_fy']);
Route::post('update_end_of_fy/{id}', [\App\Http\Controllers\ProjectProfileController::class, 'update_end_of_fy']);

// Project Status
Route::get('completed_physical_targets_status/{id}', [\App\Http\Controllers\ProjectStatusController::class, 'completed_physical_targets']);
Route::get('not_achieved_physical_targets_status/{id}', [\App\Http\Controllers\ProjectStatusController::class, 'not_achieved_physical_targets']);
Route::get('ongoing_physical_targets_status/{id}', [\App\Http\Controllers\ProjectStatusController::class, 'ongoing_physical_targets']);

// Project Summary
Route::get('action_items/{id}', [\App\Http\Controllers\ProjectController::class, 'action_items']);
Route::get('project_summary/{id}', [\App\Http\Controllers\ProjectController::class, 'summary']);

// Project Monitoring
Route::get('ongoing_physical_targets/{id}', [\App\Http\Controllers\ProjectMonitoringController::class, 'ongoing_physical_targets']);
Route::get('physical_target_status_monitoring/{id}', [\App\Http\Controllers\ProjectMonitoringController::class, 'physical_target_status']);
Route::post('add_physical_target_status_monitoring', [\App\Http\Controllers\ProjectMonitoringController::class, 'add_physical_target_status']);


