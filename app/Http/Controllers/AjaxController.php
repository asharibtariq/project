<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Report;
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
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_release')
                    ->select('tbl_release.id',
                        'tbl_release.project_id',
                        'tbl_release.fiscal_year',
                        'tbl_release.release_date',
                        'tbl_release.rel_amount',
                        'tbl_release.currency_id',
                        'tbl_release.currency',
                        'tbl_release.foreign_rel_amount',
                        'tbl_release.created_at',
                        'tbl_release.updated_at')
                    ->orderBy('tbl_release.id', 'DESC')
                    ->where('tbl_release.project_id', '=',   $id )
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
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_component')
                    ->select('tbl_component.id',
                        'tbl_component.project_id',
                        'tbl_component.fiscal_year',
                        'tbl_component.component_id',
                        'tbl_component.component',
                        'tbl_component.comp_amount',
                        'tbl_component.currency_id',
                        'tbl_component.currency',
                        'tbl_component.created_at',
                        'tbl_component.updated_at')
                    ->orderBy('tbl_component.id', 'DESC')
                    ->where('tbl_component.project_id', '=',   $id )
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
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_component_nis')
                    ->select('tbl_component_nis.id',
                        'tbl_component_nis.project_id',
                        'tbl_component_nis.fiscal_year',
                        'tbl_component_nis.component_id',
                        'tbl_component_nis.component',
                        'tbl_component_nis.comp_amount',
                        'tbl_component_nis.currency_id',
                        'tbl_component_nis.currency',
                        'tbl_component_nis.created_at',
                        'tbl_component_nis.updated_at')
                    ->orderBy('tbl_component_nis.id', 'DESC')
                    ->where('tbl_component_nis.project_id', '=',   $id )
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
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_fy_util')
                    ->select('tbl_fy_util.id',
                        'tbl_fy_util.project_id',
                        'tbl_fy_util.fiscal_year',
                        'tbl_fy_util.quarter',
                        'tbl_fy_util.fy_date',
                        'tbl_fy_util.component_id',
                        'tbl_fy_util.component',
                        'tbl_fy_util.fy_amount',
                        'tbl_fy_util.currency_id',
                        'tbl_fy_util.currency',
                        'tbl_fy_util.foreign_fy_amount',
                        'tbl_fy_util.created_at',
                        'tbl_fy_util.updated_at')
                    ->orderBy('tbl_fy_util.id', 'DESC')
                    ->where('tbl_fy_util.project_id', '=',   $id )
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

                if (!empty($id))
                    $where['tbl_physical_target.project_id'] = $id;
                if (!empty($status))
                    $where['tbl_physical_target.status'] = $status;

            //    DB::enableQueryLog(); // Enable query log

                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.currency_id',
                        'tbl_physical_target.currency',
                        'tbl_physical_target.amount',
                        'tbl_physical_target.start_date',
                        'tbl_physical_target.end_date',
                        'tbl_physical_target.created_at',
                        'tbl_physical_target.updated_at')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                //    ->where('tbl_physical_target.project_id', '=',   $id )
                    ->where($where)
                    ->paginate($per_page);

            //    dd(DB::getQueryLog());

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.ongoing_physical_target_list')->with($data);
                break;
            case 'physical_target_content_completed':
                $where = array();
                $id = $request->project_id != '' ? $request->project_id : '';
//                $status = $request->status != '' ? $request->status : '';
                $status = 'complete';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;

                if (!empty($id))
                    $where['tbl_physical_target.project_id'] = $id;
                if (!empty($status))
                    $where['tbl_physical_target.status'] = $status;

                //    DB::enableQueryLog(); // Enable query log

                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.currency_id',
                        'tbl_physical_target.currency',
                        'tbl_physical_target.amount',
                        'tbl_physical_target.start_date',
                        'tbl_physical_target.end_date',
                        'tbl_physical_target.created_at',
                        'tbl_physical_target.updated_at')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                    ->where('tbl_physical_target.target_status', '=',   $status)
//                    ->where($where)
                    ->paginate($per_page);

                //    dd(DB::getQueryLog());

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.ongoing_physical_target_list')->with($data);
                break;
            case 'physical_target_content_ongoing':
                $where = array();
                $id = $request->project_id != '' ? $request->project_id : '';
//                $status = $request->status != '' ? $request->status : '';
                $status = 'ongoing';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;

                if (!empty($id))
                    $where['tbl_physical_target.project_id'] = $id;
                if (!empty($status))
                    $where['tbl_physical_target.status'] = $status;

                //    DB::enableQueryLog(); // Enable query log

                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.currency_id',
                        'tbl_physical_target.currency',
                        'tbl_physical_target.amount',
                        'tbl_physical_target.start_date',
                        'tbl_physical_target.end_date',
                        'tbl_physical_target.created_at',
                        'tbl_physical_target.updated_at')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                    ->where('tbl_physical_target.target_status', '=',   $status)
//                    ->where($where)
                    ->paginate($per_page);

                //    dd(DB::getQueryLog());

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.ongoing_physical_target_list')->with($data);
                break;
            case 'physical_target_content_not_achieve':
                $where = array();
                $id = $request->project_id != '' ? $request->project_id : '';
//                $status = $request->status != '' ? $request->status : '';
                $status = 'not_achieve';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;

                if (!empty($id))
                    $where['tbl_physical_target.project_id'] = $id;
                if (!empty($status))
                    $where['tbl_physical_target.status'] = $status;

                //    DB::enableQueryLog(); // Enable query log

                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.currency_id',
                        'tbl_physical_target.currency',
                        'tbl_physical_target.amount',
                        'tbl_physical_target.start_date',
                        'tbl_physical_target.end_date',
                        'tbl_physical_target.created_at',
                        'tbl_physical_target.updated_at')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                    ->where('tbl_physical_target.target_status', '=',   $status)
//                    ->where($where)
                    ->paginate($per_page);

                //    dd(DB::getQueryLog());

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.ongoing_physical_target_list')->with($data);
                break;
            case 'action_items_content':
                $where = array();
                $name = $request->name != '' ? $request->name : '';
                $id = $request->project_id != '' ? $request->project_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.created_at',
                        'tbl_physical_target.updated_at')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                    ->where('tbl_physical_target.project_id', '=', $id)
                    ->where('tbl_physical_target.target_status', '=', 'ongoing')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.action_items.action_items_list')->with($data);
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
                $project = DB::table('tbl_physical_target_status')
                    ->select('tbl_physical_target_status.id',
                        'tbl_physical_target_status.project_id',
                        'tbl_physical_target_status.physical_target_id',
                        'tbl_physical_target_status.date',
                        'tbl_physical_target_status.pace',
                        'tbl_physical_target_status.status')
                //    ->groupBy('tbl_physical_target_status.id')
                    ->orderBy('tbl_physical_target_status.id', 'DESC')
                    ->where('tbl_physical_target_status.physical_target_id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.physical_target_status_list')->with($data);
                break;
            case 'financial_progress_content':
                $where = array();
                $id = $request->physical_target_id != '' ? $request->physical_target_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.amount',
                        'tbl_physical_target.start_date',
                        'tbl_physical_target.end_date',
                        'tbl_physical_target.status')
                    //    ->groupBy('tbl_physical_target.id')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                    ->where('tbl_physical_target.id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.list')->with($data);
                break;
            case 'physical_progress_content':
                $where = array();
                $id = $request->physical_target_id != '' ? $request->physical_target_id : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                $project = DB::table('tbl_physical_target')
                    ->select('tbl_physical_target.id',
                        'tbl_physical_target.project_id',
                        'tbl_physical_target.fiscal_year',
                        'tbl_physical_target.component_id',
                        'tbl_physical_target.component',
                        'tbl_physical_target.physical_description',
                        'tbl_physical_target.amount',
                        'tbl_physical_target.start_date',
                        'tbl_physical_target.end_date',
                        'tbl_physical_target.status')
                    //    ->groupBy('tbl_physical_target.id')
                    ->orderBy('tbl_physical_target.id', 'DESC')
                    ->where('tbl_physical_target.id', '=',   $id )
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.monitoring.list')->with($data);
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
