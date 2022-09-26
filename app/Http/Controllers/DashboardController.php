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

}
