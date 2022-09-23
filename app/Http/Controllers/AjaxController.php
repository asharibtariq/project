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
                        'tbl_project.cost',
                        'tbl_project.local_fund',
                        'tbl_project.foreign_fund',
                        'tbl_project.start_date',
                        'tbl_project.end_date',
                        'tbl_project.complete_date',
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
            case 'single_project_content':
                $where = array();
                $project_id = $request->project_id != '' ? $request->project_id : '';
                $fiscal_year = $request->fiscal_year != '' ? $request->fiscal_year : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_report.title'] = $title;
                */
                $project = DB::table('tbl_report')
                    ->leftJoin('tbl_project', 'tbl_report.project_id', '=', 'tbl_project.id')
                    ->select('tbl_report.id',
                        'tbl_report.project_id',
                        'tbl_report.fiscal_year',
                        'tbl_report.date',
                        'tbl_report.alloc_rupee',
                        'tbl_report.alloc_foreign',
                        'tbl_report.alloc_total',
                        'tbl_report.alloc_revised',
                        'tbl_report.release_fund_auth',
                        'tbl_report.release_fund_actual',
                        'tbl_report.release_foreign',
                        'tbl_report.release_total_actual',
                        'tbl_report.util_actual',
                        'tbl_report.util_foreign',
                        'tbl_report.util_total',
                        'tbl_report.amt_surrender',
                        'tbl_report.amt_lapsed',
                        'tbl_report.financial_prog',
                        'tbl_report.physical_prog',
                        'tbl_report.physical_prog_desc',
                        'tbl_report.comp_date_likely',
                        'tbl_report.remarks',
                        'tbl_report.note',
                        'tbl_project.psdp',
                        'tbl_project.name as project',
                        'tbl_project.psid',
                        'tbl_project.cost',
                        'tbl_project.complete_date')
                    ->where('tbl_report.project_id', '=', $project_id)
                    //    ->groupBy('tbl_report.id')
                    ->orderBy('tbl_report.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.single_project_list')->with($data);
                break;
            case 'report_content':
                $where = array();
                $userData = loggedIn();
                $user_id = $userData['user_id'];
                $user_role = $userData['role_id'];
                $project_id = $request->project_id != '' ? $request->project_id : '';
                $fiscal_year = $request->fiscal_year != '' ? $request->fiscal_year : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                if (!empty($project_id))
                    $where['tbl_report.project_id'] = $project_id;
                if (!empty($fiscal_year))
                    $where['tbl_report.fiscal_year'] = $fiscal_year;
                if ($user_role == 2){
                    $where['tbl_report.created_by'] = $user_id;
                }
                $project = DB::table('tbl_report')
                    ->leftJoin('tbl_project', 'tbl_report.project_id', '=', 'tbl_project.id')
                    ->select('tbl_report.id',
                        'tbl_report.fiscal_year',
                        'tbl_report.date',
                        'tbl_report.project_id',
                        'tbl_report.actual_expend',
                        'tbl_report.alloc_rupee',
                        'tbl_report.alloc_foreign',
                        'tbl_report.alloc_total',
                        'tbl_report.alloc_revised',
                        'tbl_report.release_fund_auth',
                        'tbl_report.release_fund_actual',
                        'tbl_report.release_foreign',
                        'tbl_report.release_total_actual',
                        'tbl_report.util_actual',
                        'tbl_report.util_foreign',
                        'tbl_report.util_total',
                        'tbl_report.amt_surrender',
                        'tbl_report.amt_lapsed',
                        'tbl_report.financial_prog',
                        'tbl_report.physical_prog',
                        'tbl_report.physical_prog_desc',
                        'tbl_report.comp_date_likely',
                        'tbl_report.remarks',
                        'tbl_report.note',
                        'tbl_project.psdp',
                        'tbl_project.name as project',
                        'tbl_project.psid',
                        'tbl_project.cost',
                        'tbl_project.complete_date')
                    ->where($where)
                //    ->groupBy('tbl_report.id')
                //    ->orderBy('tbl_report.id', 'DESC')
                    ->orderBy('tbl_report.project', 'ASC')
                //    ->orderBy('tbl_report.fiscal_year', 'ASC')
                    ->orderBy('tbl_report.date', 'ASC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.report.report_list')->with($data);
                break;
            case 'log_content':
                $where = array();
                $project_id = $request->project_id != '' ? $request->project_id : '';
                $start_date = $request->start_date != '' ? $request->start_date : '';
                $end_date = $request->end_date != '' ? $request->end_date : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;

                if (!empty($project_id))
                    $where[] = ['tbl_report_log.project_id', ' = ', $project_id];
                //    $where['tbl_report_log.project_id'] = $project_id;

                if (!empty($start_date)) {
                    $s_date = date('Y-m-d', strtotime($start_date . ' 00:00:00'));
                    $where[] = ['tbl_report_log.created_at', ' >= ', ''.$s_date . ' 00:00:00'];
                //    $where['tbl_report_log.created_at'] = ' >= '.$start_date.' 00:00:00';
                //    pre($s_date);
                }

                if (!empty($end_date)) {
                    $e_date = date('Y-m-d', strtotime($end_date . ' 23:59:59'));
                    $where[] = ['tbl_report_log.created_at', ' <= ', ''.$e_date . ' 23:59:59'];
                //    $where['tbl_report_log.created_at'] = ' <= '.$end_date.' 23:59:59';
                //    pre($e_date);
                }

                $log = DB::table('tbl_report_log')
                    ->leftJoin('tbl_project', 'tbl_report_log.project_id', '=', 'tbl_project.id')
                    ->leftJoin('users', 'tbl_report_log.user_id', '=', 'users.id')
                    ->select('tbl_report_log.id',
                        'tbl_report_log.report_id',
                        'tbl_report_log.project_id',
                        'tbl_report_log.project',
                        'tbl_report_log.data',
                        'tbl_report_log.created_at',
                        'tbl_report_log.updated_at',
                        'tbl_project.psdp',
                        'tbl_project.psid',
                        'tbl_project.cost',
                        'tbl_project.complete_date',
                        'users.name AS user_name')
                    ->where($where)
                //    ->groupBy('tbl_report_log.id')
                //    ->orderBy('tbl_report_log.id', 'DESC')
                //    ->orderBy('tbl_report_log.project', 'ASC')->toSql();
                    ->orderBy('tbl_report_log.project', 'ASC')
                    ->paginate($per_page);
        //    pre($log,1);

                $data['result'] = $log->items();
                $data['links'] = $log;
                return view('adminpanel.log.log_list')->with($data);
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

    public function getActualExpenditure(Request $request){
        $result = "";
        $where = array();
        $data = array();
        $project_id = $request->project_id != '' ? $request->project_id : '';
        if (!empty($project_id))
            $where['tbl_report.project_id'] = $project_id;
        if ($project_id != '') {
            $project = DB::table('tbl_report')
                ->select('tbl_report.fiscal_year',
                    'tbl_report.date',
                    'tbl_report.actual_expend',
                    'tbl_report.util_total')
                ->where($where)
            //    ->orderBy('tbl_report.fiscal_year', 'DESC')
                ->orderBy('tbl_report.date', 'DESC')
                ->paginate();

//        $data = $project->items();
        //    pre($project->items(),1);
            $data['result'] = $project->items();
            $data['links'] = $project;
        }
        else{
            $data['result'] = array();
        }
//        pre($data['result'],1);
        return view('adminpanel.report.actual_expenditure_list')->with($data);
    }

}
