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
        $total_projects = DB::table('tbl_project')->distinct('name')->count('name');
        $total_allocations = Report::where('status', 'Y')->sum('alloc_total');
        $total_releases = Report::where('status', 'Y')->sum('release_total_actual');
        $total_utilization = Report::where('status', 'Y')->sum('util_total');

        $financial_percentage = ($total_utilization/$total_allocations) * 100;
        $data['total_projects'] = $total_projects;
        $data['total_allocations'] = $total_allocations;
        $data['total_releases'] = $total_releases;
        $data['total_utilization'] = $total_utilization;
        $data['financial_percentage'] = number_format((float)$financial_percentage, 2, '.', '');
        $data['start_date'] = '';
        $data['end_date'] = '';
        return view('adminpanel/dashboard', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request){
        $data = array();
        $postData = $request->all();
        $start_date = isset($postData['start_date']) && $postData['start_date'] != '' ? $postData['start_date'] : '';
        $end_date = isset($postData['end_date']) && $postData['end_date'] != '' ? $postData['end_date'] : '';

        $total_projects = DB::table('tbl_project')->distinct('name')->count('name');

        /*
        if ($start_date != '' || $end_date != '') {
            $where = [['date','>=',$start_date],['date','<=', $end_date],['status','=', 'Y']];
            $total_allocations = Report::where($where)->sum('alloc_total');
            $total_releases = Report::where($where)->sum('release_total_actual');
            $total_utilization = Report::where($where)->sum('util_total');
        }else{
            $total_allocations = Report::where('status', 'Y')->sum('alloc_total');
            $total_releases = Report::where('status', 'Y')->sum('release_total_actual');
            $total_utilization = Report::where('status', 'Y')->sum('util_total');
        }
        */

        $total_allocations = Report::where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('alloc_total');
        $total_releases = Report::where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('release_total_actual');
        $total_utilization = Report::where('date','>=',$start_date)->where('date','<=', $end_date)->where('status','=', 'Y')->sum('util_total');

        $financial_percentage = ($total_utilization/$total_allocations) * 100;
        $data['total_projects'] = $total_projects;
        $data['total_allocations'] = $total_allocations;
        $data['total_releases'] = $total_releases;
        $data['total_utilization'] = $total_utilization;
        $data['financial_percentage'] = number_format((float)$financial_percentage, 2, '.', '');
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        return view('adminpanel/dashboard', $data);
    }

}
