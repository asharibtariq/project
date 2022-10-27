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
