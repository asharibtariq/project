<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $data = array();
    //    $total_projects = DB::table('tbl_project')->distinct('name')->count('name');

        $userData = loggedIn();
        $user_id = $userData['user_id'];
        $user_role = $userData['role_id'];

        if ($user_role == 2) {
            $total_projects = Report::where('created_by', $user_id)->where('status', 'Y')->distinct('project_id')->count('project_id');
            $total_allocations = Report::where('created_by', $user_id)->where('status', 'Y')->sum('alloc_total');
            $total_releases = Report::where('created_by', $user_id)->where('status', 'Y')->sum('release_total_actual');
        }else{
            $total_projects = Report::where('status', 'Y')->distinct('project_id')->count('project_id');
            $total_allocations = Report::where('status', 'Y')->sum('alloc_total');
            $total_releases = Report::where('status', 'Y')->sum('release_total_actual');
        }

        /*

        //disable ONLY_FULL_GROUP_BY
        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

        //re-enable ONLY_FULL_GROUP_BY
        DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");

        */

        $total_utilization = $this->util_total();
        if ($total_utilization > 0 && $total_allocations > 0) {
            $financial_percentage = ($total_utilization / $total_allocations) * 100;
        }else{
            $financial_percentage = 0;
        }

        $data['range_data'] = $this->_rangeData();
        $data['total_projects'] = $total_projects;
        $data['total_allocations'] = $total_allocations;
        $data['total_releases'] = $total_releases;
        $data['total_utilization'] = $total_utilization;
        $data['financial_percentage'] = number_format((float)$financial_percentage, 2, '.', '');
        $data['start_date'] = '';
        $data['end_date'] = '';
        return view('adminpanel/dashboard', $data);
    }

    public function dashboard(Request $request){
        $data = array();
        $postData = $request->all();
        $start_date = isset($postData['start_date']) && $postData['start_date'] != '' ? $postData['start_date'] : '';
        $end_date = isset($postData['end_date']) && $postData['end_date'] != '' ? $postData['end_date'] : '';

        $userData = loggedIn();
        $user_id = $userData['user_id'];
        $user_role = $userData['role_id'];

        if ($user_role == 2) {
            $total_projects = Report::where('created_by', $user_id)->where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->distinct('project_id')->count('project_id');
            $total_allocations = Report::where('created_by', $user_id)->where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('alloc_total');
            $total_releases = Report::where('created_by', $user_id)->where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('release_total_actual');
        }else{
            $total_projects = Report::where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->distinct('project_id')->count('project_id');
            $total_allocations = Report::where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('alloc_total');
            $total_releases = Report::where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('release_total_actual');
        }

        $total_utilization = $this->util_total('date >= "'.$start_date.'" AND date <= "'.$end_date.'"');
        if ($total_utilization > 0 && $total_allocations > 0) {
            $financial_percentage = ($total_utilization / $total_allocations) * 100;
        }else{
            $financial_percentage = 0;
        }

        $data['total_projects'] = $total_projects;
        $data['total_allocations'] = $total_allocations;
        $data['total_releases'] = $total_releases;
        $data['total_utilization'] = $total_utilization;
        $data['financial_percentage'] = number_format((float)$financial_percentage, 2, '.', '');
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        return view('adminpanel/dashboard', $data);
    }

    public function util_total($where = ''){
        $userData = loggedIn();
        $user_id = $userData['user_id'];
        $user_role = $userData['role_id'];

        $get_user_projects_where = '';
        if ($user_role == 2){
            $get_user_projects_where =  'AND created_by = "'.$user_id.'"';
        }

        $util_totals = array();
        $condition = '';
        $total = 0;
        if ($where != ''){
            $condition = ' AND '.$where;
        }
        $project_ids = DB::select('Select DISTINCT(project_id) from tbl_report WHERE status = "Y"'.$get_user_projects_where.'');
        if (!empty($project_ids) && count($project_ids) > 0) {
            foreach ($project_ids as $project_id) {
                $result = DB::select('Select util_total from tbl_report WHERE project_id = "' . $project_id->project_id . '" ' . $condition . ' ORDER BY date DESC LIMIT 1');
                $util_totals[] = array_shift($result);
            }
        }
        if (!empty($util_totals) && count($util_totals) > 0){
            foreach ($util_totals as $util_total){
                $ut = isset($util_total->util_total) && $util_total->util_total > 0 ? $util_total->util_total : 0;
                $total = $total + $ut;
            }
        }
        return $total;
    }

    function _rangeData(){
        $record = array();

        $record[0]['project'] = 'Backup';
        $record[0]['start_date'] = '21/11/2014';
        $record[0]['end_date'] = '02/12/2014';
        $record[0]['status_precent'] = 25;

        $record[1]['project'] = 'Recovery';
        $record[1]['start_date'] = '02/12/2014';
        $record[1]['end_date'] = '19/12/2014';
        $record[1]['status_precent'] = 75;

        $record[2]['project'] = 'Elementor';
        $record[2]['start_date'] = '10/12/2014';
        $record[2]['end_date'] = '23/12/2014';
        $record[2]['status_precent'] = 80;

        $record[3]['project'] = 'VPN';
        $record[3]['start_date'] = '02/12/2014';
        $record[3]['end_date'] = '10/12/2014';
        $record[3]['status_precent'] = 100;

    //    $range_graph_data_categories = ['Backup', 'Recovery', 'Elementor Issue', 'VPN Issue'];

        $range_graph_data = array();
        $string_raw = "";
        foreach ($record as $key => $value){
            $start_date_array = array();
            $end_date_array = array();
            $start_date_day = "";
            $start_date_month = "";
            $start_date_year = "";
            $end_date_day = "";
            $end_date_month = "";
            $end_date_year = "";

            $percentage = $value['status_precent']/100;

            $start_date_array = explode('/',$value['start_date']);
            $end_date_array = explode('/',$value['end_date']);

            $start_date_day = $start_date_array[0];
            $start_date_month = $start_date_array[1];
            $start_date_year = $start_date_array[2];

            $end_date_day = $end_date_array[0];
            $end_date_month = $end_date_array[1];
            $end_date_year = $end_date_array[2];

            $string_raw .= "{x: Date.UTC(".$start_date_year.", ".$start_date_month.", ".$start_date_day."), x2: Date.UTC(".$end_date_year.", ".$end_date_month.", ".$end_date_day."), y: ".$key.", partialFill: ".$percentage."},";
            $range_graph_data_categories[] = $value['project'];
        }
        $data_string = rtrim($string_raw,',');
    //    $category_string = "'".implode($range_graph_data_categories,"','")."'";
        $category_string = "";

        foreach ($range_graph_data_categories as $category){
            $category_string .= "'".$category."',";
        }
        $category_string = rtrim($category_string, ',');

        $rangeData['graph_data'] = $data_string;
        $rangeData['categories'] = $category_string;
    //    pre($rangeData,1);
        return $rangeData;
    }

}
