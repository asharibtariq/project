<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\elementType;

class AjaxController extends Controller{

    public function __construct(){
    //    $this->middleware('auth');
    }

    public function content(Request $request){
        $action = $request->action;
        $data ['action'] = $action;
        $output = [];
        switch ($action) {
            case 'user_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($name))
                        $where['users.name'] = $name;
                */
                $project = DB::table('users')
                    ->select('users.id',
                        'users.name',
                        'users.username',
                        'users.role_id',
                        'users.role',
                        'users.status',
                        'users.email')
                    ->where('name', 'LIKE', '%' . $name . '%')
                    //    ->groupBy('users.id')
                    ->orderBy('users.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.user.user_list')->with($data);
                break;
            case 'project_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_project')
                    ->select('tbl_project.id',
                        'tbl_project.psdp',
                        'tbl_project.psid',
                        'tbl_project.name',
                        'tbl_project.approval_type',
                        'tbl_project.fiscal_year',
                        'tbl_project.executiveagency_id',
                        'tbl_project.executiveagency',
                        'tbl_project.approval_date',
                        'tbl_project.cost',
                        'tbl_project.currency_id',
                        'tbl_project.currency',
                        'tbl_project.forum',
                        'tbl_project.start_date',
                        'tbl_project.end_date',
                        'tbl_project.status',
                        'tbl_project.created_at',
                        'tbl_project.updated_at')
                    ->where('name', 'LIKE', '%' . $name . '%')
                    //    ->groupBy('tbl_project.id')
                    ->orderBy('tbl_project.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.project_list')->with($data);
                break;
            case 'designation_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($name))
                        $where['users.name'] = $name;
                */
                $project = DB::table('tbl_designations')
                    ->select('tbl_designations.id',
                        'tbl_designations.name',
                        'tbl_designations.status')
                    ->where('name', 'LIKE', '%' . $name . '%')
                    //    ->groupBy('users.id')
                    ->orderBy('tbl_designations.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.designation.designation_list')->with($data);
                break;
            case 'executiveagency_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($name))
                        $where['users.name'] = $name;
                */
                $project = DB::table('tbl_executive_agencies')
                    ->select('tbl_executive_agencies.id',
                        'tbl_executive_agencies.name',
                        'tbl_executive_agencies.status')
                    ->where('name', 'LIKE', '%' . $name . '%')
                    //    ->groupBy('users.id')
                    ->orderBy('tbl_executive_agencies.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.executiveagency.executiveagency_list')->with($data);
                break;
            case 'component_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($name))
                        $where['users.name'] = $name;
                */
                $project = DB::table('tbl_components')
                    ->select('tbl_components.id',
                        'tbl_components.name',
                        'tbl_components.status')
                    ->where('name', 'LIKE', '%' . $name . '%')
                    //    ->groupBy('users.id')
                    ->orderBy('tbl_components.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.component.component_list')->with($data);
                break;
            case 'organization_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($name))
                        $where['users.name'] = $name;
                */
                $project = DB::table('tbl_organizations')
                    ->select('tbl_organizations.id',
                        'tbl_organizations.name',
                        'tbl_organizations.status')
                    ->where('name', 'LIKE', '%' . $name . '%')
                    //    ->groupBy('users.id')
                    ->orderBy('tbl_organizations.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.organization.organization_list')->with($data);
                break;
            default:
                break;
        }
    }

    public function project_details_content(Request $request){
        $action = $request->action;
        $data ['action'] = $action;
        $output = [];
        switch ($action) {
            case 'allocation_content':
                $where = array();
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $project = DB::table('tbl_project_allocation')
                    ->select('tbl_project_allocation.id',
                        'tbl_project_allocation.project_id',
                        'tbl_project_allocation.fiscal_year',
                        'tbl_project_allocation.alloc_date',
                        'tbl_project_allocation.alloc_amount',
                        'tbl_project_allocation.currency_id',
                        'tbl_project_allocation.currency',
                        'tbl_project_allocation.foreign_alloc_amount',
                        'tbl_project_allocation.status')
                    //    ->groupBy('tbl_project_allocation.id')
                    ->orderBy('tbl_project_allocation.id', 'DESC')
                    ->where('tbl_project_allocation.project_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.profile.allocation_list')->with($data);
                break;
            case 'release_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project_release.name'] = $title;
                */
                $project = DB::table('tbl_project_release')
                    ->select('tbl_project_release.id',
                        'tbl_project_release.project_id',
                        'tbl_project_release.project_name',
                        'tbl_project_release.fiscal_year',
                        'tbl_project_release.release_date',
                        'tbl_project_release.rel_amount',
                        'tbl_project_release.currency_id',
                        'tbl_project_release.currency',
                        'tbl_project_release.foreign_rel_amount',
                        'tbl_project_release.created_at',
                        'tbl_project_release.updated_at')
                    ->orderBy('tbl_project_release.id', 'DESC')
                    ->where('tbl_project_release.project_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.profile.release_list')->with($data);
                break;
            case 'component_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project_component.project'] = $title;
                */
                $project = DB::table('tbl_project_component')
                    ->select('tbl_project_component.id',
                        'tbl_project_component.project_id',
                        'tbl_project_component.project_name',
                        'tbl_project_component.fiscal_year',
                        'tbl_project_component.component_id',
                        'tbl_project_component.component',
                        'tbl_project_component.comp_amount',
                        'tbl_project_component.currency_id',
                        'tbl_project_component.currency',
                        'tbl_project_component.foreign_amount',
                        'tbl_project_component.created_at',
                        'tbl_project_component.updated_at')
                    ->orderBy('tbl_project_component.id', 'DESC')
                    ->where('tbl_project_component.project_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.profile.component_pc1_list')->with($data);
                break;
            case 'component_nis_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project_component_nis.name'] = $title;
                */
                $project = DB::table('tbl_project_component_nis')
                    ->select('tbl_project_component_nis.id',
                        'tbl_project_component_nis.project_id',
                        'tbl_project_component_nis.project_name',
                        'tbl_project_component_nis.fiscal_year',
                        'tbl_project_component_nis.component_id',
                        'tbl_project_component_nis.component',
                        'tbl_project_component_nis.comp_amount',
                        'tbl_project_component_nis.currency_id',
                        'tbl_project_component_nis.currency',
                        'tbl_project_component_nis.foreign_amount',
                        'tbl_project_component_nis.created_at',
                        'tbl_project_component_nis.updated_at')
                    ->orderBy('tbl_project_component_nis.id', 'DESC')
                    ->where('tbl_project_component_nis.project_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.profile.component_nis_list')->with($data);
                break;
            case 'fy_util_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project_fy_util.project'] = $title;
                */
                $project = DB::table('tbl_project_fy_util')
                    ->select('tbl_project_fy_util.id',
                        'tbl_project_fy_util.project_id',
                        'tbl_project_fy_util.project_name',
                        'tbl_project_fy_util.fiscal_year',
                        'tbl_project_fy_util.quarter',
                        'tbl_project_fy_util.fy_date',
                        'tbl_project_fy_util.component_id',
                        'tbl_project_fy_util.component',
                        'tbl_project_fy_util.fy_amount',
                        'tbl_project_fy_util.currency_id',
                        'tbl_project_fy_util.currency',
                        'tbl_project_fy_util.foreign_fy_amount',
                        'tbl_project_fy_util.created_at',
                        'tbl_project_fy_util.updated_at')
                    ->orderBy('tbl_project_fy_util.id', 'DESC')
                    ->where('tbl_project_fy_util.project_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.profile.fy_util_list')->with($data);
                break;
            case 'physical_target_content':
                $where = array();
                $id = $request->project_id != '' ? $request->project_id : '';
                $status = $request->status != '' ? $request->status : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $next_page = $request->next_page != '' ? $request->next_page : 'edit_physical_target';

                if (!empty($id))
                    $where['tbl_project_physical_target.project_id'] = $id;
                if (!empty($status))
                    $where['tbl_project_physical_target.target_status'] = $status;

            //    DB::enableQueryLog(); // Enable query log

                $project = DB::table('tbl_project_physical_target')
                    ->select('tbl_project_physical_target.id',
                        'tbl_project_physical_target.project_id',
                        'tbl_project_physical_target.fiscal_year',
                        'tbl_project_physical_target.component_id',
                        'tbl_project_physical_target.component',
                        'tbl_project_physical_target.physical_description',
                        'tbl_project_physical_target.currency_id',
                        'tbl_project_physical_target.currency',
                        'tbl_project_physical_target.amount',
                        'tbl_project_physical_target.date',
                        'tbl_project_physical_target.start_date',
                        'tbl_project_physical_target.end_date',
                        'tbl_project_physical_target.created_at',
                        'tbl_project_physical_target.updated_at')
                    ->orderBy('tbl_project_physical_target.id', 'DESC')
                //    ->where('tbl_project_physical_target.project_id', '=',   $id )
                    ->where($where)
                    ->paginate($per_page);

            //    dd(DB::getQueryLog());

                $data['result'] = $project->items();
                $data['next_page'] = $next_page;
                $data['links'] = $project;
                return view('adminpanel.project.profile.physical_target_list')->with($data);
                break;
            case 'end_of_fy_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project_end_of_fy.name'] = $title;
                */
                $project = DB::table('tbl_project_end_of_fy')
                    ->select('tbl_project_end_of_fy.id',
                        'tbl_project_end_of_fy.project_id',
                        'tbl_project_end_of_fy.project_name',
                        'tbl_project_end_of_fy.fiscal_year',
                        'tbl_project_end_of_fy.date',
                        'tbl_project_end_of_fy.local_amount_surrender',
                        'tbl_project_end_of_fy.currency_id_surrender',
                        'tbl_project_end_of_fy.currency_surrender',
                        'tbl_project_end_of_fy.foreign_amount_surrender',
                        'tbl_project_end_of_fy.local_amount_lapsed',
                        'tbl_project_end_of_fy.currency_id_lapsed',
                        'tbl_project_end_of_fy.currency_lapsed',
                        'tbl_project_end_of_fy.foreign_amount_lapsed',
                        'tbl_project_end_of_fy.financial_progress',
                        'tbl_project_end_of_fy.physical_progress',
                        'tbl_project_end_of_fy.remarks',
                        'tbl_project_end_of_fy.status',
                        'tbl_project_end_of_fy.created_at',
                        'tbl_project_end_of_fy.updated_at')
                    ->orderBy('tbl_project_end_of_fy.id', 'DESC')
                    ->where('tbl_project_end_of_fy.project_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.profile.end_of_fy_list')->with($data);
                break;
            case 'action_items_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project_physical_target_status.name'] = $title;
                */
                $project = DB::table('tbl_project_physical_target_status')
                    ->leftJoin('tbl_project_physical_target', 'tbl_project_physical_target_status.physical_target_id', '=', 'tbl_project_physical_target.id')
                    ->select('tbl_project_physical_target_status.id',
                        'tbl_project_physical_target_status.physical_target_id',
                        'tbl_project_physical_target_status.inspect_date',
                        'tbl_project_physical_target.physical_description')
                    ->orderBy('tbl_project_physical_target_status.id', 'DESC')
                    ->where('tbl_project_physical_target.project_id', '=', $id)
                    ->where('tbl_project_physical_target.target_status', '=', 'ongoing')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.action_items.action_items_list')->with($data);
                break;
            case 'add_action_items_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $physical_target_id = $request->physical_target_id != '' ? $request->physical_target_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($name))
                        $where['tbl_project_action_items.name'] = $name;
                */
                $project = DB::table('tbl_project_action_items')
                    ->select('tbl_project_action_items.id',
                        'tbl_project_action_items.project_id',
                        'tbl_project_action_items.project',
                        'tbl_project_action_items.physical_target_id',
                        'tbl_project_action_items.date',
                        'tbl_project_action_items.component_id',
                        'tbl_project_action_items.component',
                        'tbl_project_action_items.action_item',
                        'tbl_project_action_items.assigned_to',
                        'tbl_project_action_items.start_date',
                        'tbl_project_action_items.end_date',
                        'tbl_project_action_items.created_at',
                        'tbl_project_action_items.updated_at')
                    ->orderBy('tbl_project_action_items.id', 'DESC')
                    ->where('tbl_project_action_items.project_id', '=', $id)
                    ->where('tbl_project_action_items.physical_target_id', '=', $physical_target_id)
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.action_items.add_action_items_list')->with($data);
                break;
            default:
                break;
        }
    }

    public function physical_target_content(Request $request){
        $action = $request->action;
        $data ['action'] = $action;
        $output = [];
        switch ($action) {
            case 'status_content':
                $where = array();
                $id = $request->physical_target_id != '' ? $request->physical_target_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $project = DB::table('tbl_project_physical_target_status')
                    ->select('tbl_project_physical_target_status.id',
                        'tbl_project_physical_target_status.project_id',
                        'tbl_project_physical_target_status.project',
                        'tbl_project_physical_target_status.physical_target_id',
                        'tbl_project_physical_target_status.date',
                        'tbl_project_physical_target_status.inspect_date',
                        'tbl_project_physical_target_status.pace',
                        'tbl_project_physical_target_status.status')
                //    ->groupBy('tbl_project_physical_target_status.id')
                    ->orderBy('tbl_project_physical_target_status.id', 'DESC')
                    ->where('tbl_project_physical_target_status.physical_target_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.physical_target_status_list')->with($data);
                break;
            case 'financial_progress_content':
                $where = array();
                $id = $request->physical_target_id != '' ? $request->physical_target_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $project = DB::table('tbl_project_financial_progress')
                    ->select('tbl_project_financial_progress.id',
                        'tbl_project_financial_progress.project_id',
                        'tbl_project_financial_progress.project',
                        'tbl_project_financial_progress.fiscal_year',
                        'tbl_project_financial_progress.component_id',
                        'tbl_project_financial_progress.component',
                        'tbl_project_financial_progress.physical_description',
                        'tbl_project_financial_progress.amount',
                        'tbl_project_financial_progress.date',
                        'tbl_project_financial_progress.inspect_date',
                        'tbl_project_financial_progress.status')
                    //    ->groupBy('tbl_project_financial_progress.id')
                    ->orderBy('tbl_project_financial_progress.id', 'DESC')
                    ->where('tbl_project_financial_progress.physical_target_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.financial_progress_list')->with($data);
                break;
            case 'physical_progress_content':
                $where = array();
                $id = $request->physical_target_id != '' ? $request->physical_target_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $project = DB::table('tbl_project_physical_progress')
                    ->select('tbl_project_physical_progress.id',
                        'tbl_project_physical_progress.project_id',
                        'tbl_project_physical_progress.project',
                        'tbl_project_physical_progress.fiscal_year',
                        'tbl_project_physical_progress.date',
                        'tbl_project_physical_progress.inspect_date',
                        'tbl_project_physical_progress.component_id',
                        'tbl_project_physical_progress.component',
                        'tbl_project_physical_progress.physical_description',
                        'tbl_project_physical_progress.amount',
                        'tbl_project_physical_progress.status')
                    //    ->groupBy('tbl_project_physical_progress.id')
                    ->orderBy('tbl_project_physical_progress.id', 'DESC')
                    ->where('tbl_project_physical_progress.physical_target_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.physical_progress_list')->with($data);
                break;
            default:
                break;
        }
    }

    public function getDateRecord(Request $request){
        $result = "";
        $where = array();
        $data = array();
        $project_id = $request->project_id != '' ? $request->project_id : '';
        if ($project_id != '')
            $where['tbl_report.project_id'] = $request->project_id;

        $report = DB::table('tbl_report')
                            ->select('tbl_report.alloc_rupee', 'tbl_report.alloc_foreign')
                            ->where($where)
                            ->orderBy('tbl_report.date', 'DESC')
                            ->paginate(1);
        $report = $report->items();

        if (!empty($report) && count($report) > 0) {
            $data['status'] = 1;
            $data['alloc_rupee'] = $report[0]->alloc_rupee;
            $data['alloc_foreign'] = $report[0]->alloc_foreign;
        } else {
            $data['status'] = 0;
            $data['alloc_rupee'] = 0;
            $data['alloc_foreign'] = 0;
        }
        $result = json_encode($data);
        return $result;
    }

    public function checkDateRecord(Request $request){
        $result = "";
        $where = array();
        $data = array();
        $project_id = $request->project_id != '' ? $request->project_id : '';
        $date = $request->date != '' ? $request->date : '';
        if ($project_id != '')
            $where['tbl_report.project_id'] = $request->project_id;
        if ($date != '')
            $where['tbl_report.date'] = $request->date;

    //    $report = Report::all()->where($where);
        $report = DB::table('tbl_report')
                            ->select('tbl_report.date')
                            ->where($where)
                            ->orderBy('tbl_report.id', 'DESC')
                            ->paginate(1);
        $report = $report->items();

        if (!empty($report) && count($report) > 0) {
            $data = 1;
        } else {
            $data = 0;
        }
        $result = json_encode($data);
        return $result;
    }


}
