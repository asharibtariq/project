<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\ProjectAllocation;
use App\Models\ProjectPhysicalTarget;
use App\Models\ProjectPhysicalTargetStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function task_percent_report(Request $request){
        $data = array();
        $postData = $request->all();
        $project_id = isset($postData['project_id']) && $postData['project_id'] != '' ? $postData['project_id'] : '';
        $start_date = isset($postData['start_date']) && $postData['start_date'] != '' ? $postData['start_date'] : '';
        $end_date = isset($postData['end_date']) && $postData['end_date'] != '' ? $postData['end_date'] : '';

    //    $physicalTargetSqlData = ProjectPhysicalTarget::all()->where('date','>=',$start_date)->where('date','<=', $end_date)->where('project_id','=',$project_id)->where('status','=','Y');
        $physicalTargetSqlData = ProjectPhysicalTarget::all()->where('project_id','=',$project_id)->where('status','=','Y');

        $data['project_physical_targets'] = $physicalTargetSqlData;
        $data['project_id'] = $project_id;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['project_select'] = get_project($project_id);
        $data['range_data'] = $this->_rangeData($physicalTargetSqlData);
        return view('adminpanel/report/task_percent_report', $data);
    }

    function _rangeData($physicalTargetSqlData){
        $record = array();

        $record[0]['project_name'] = 'Backup';
        $record[0]['start_date'] = '21/11/2014';
        $record[0]['end_date'] = '02/12/2014';
        $record[0]['status_precent'] = 25;

        $record[1]['project_name'] = 'Recovery';
        $record[1]['start_date'] = '02/12/2014';
        $record[1]['end_date'] = '19/12/2014';
        $record[1]['status_precent'] = 75;

        $record[2]['project_name'] = 'Elementor';
        $record[2]['start_date'] = '10/12/2014';
        $record[2]['end_date'] = '23/12/2014';
        $record[2]['status_precent'] = 80;

        $record[3]['project_name'] = 'VPN';
        $record[3]['start_date'] = '02/12/2014';
        $record[3]['end_date'] = '10/12/2014';
        $record[3]['status_precent'] = 100;

        $range_graph_data = array();
        $string_raw = "";
        $record = $physicalTargetSqlData;

        if (!empty($record) && count($record) > 0) {
            foreach ($record as $key => $value) {
                $start_date_array = array();
                $end_date_array = array();
                $start_date_day = "";
                $start_date_month = "";
                $start_date_year = "";
                $end_date_day = "";
                $end_date_month = "";
                $end_date_year = "";

                $percentage = $value['status_precent'] / 100;
                ////////////////
                $percentage = 1;
                ////////////////
                $start_date_array = explode('/', $value['start_date']);
                $end_date_array = explode('/', $value['end_date']);

                $start_date_day = $start_date_array[0];
                $start_date_month = $start_date_array[1];
                $start_date_year = $start_date_array[2];

                $end_date_day = $end_date_array[0];
                $end_date_month = $end_date_array[1];
                $end_date_year = $end_date_array[2];

                $string_raw .= "{x: Date.UTC(" . $start_date_year . ", " . $start_date_month . ", " . $start_date_day . "), x2: Date.UTC(" . $end_date_year . ", " . $end_date_month . ", " . $end_date_day . "), y: " . $key . ", partialFill: " . $percentage . "},";
                $range_graph_data_categories[] = $value['project_name'];
            }
            $data_string = rtrim($string_raw, ',');
            $category_string = "";

            foreach ($range_graph_data_categories as $category) {
                $category_string .= "'" . $category . "',";
            }
            $category_string = rtrim($category_string, ',');
        }else{
            $data_string = '';
            $category_string = '';
            $range_graph_data_categories = array();
        }
        $rangeData['graph_data'] = $data_string;
        $rangeData['categories'] = $category_string;
        $rangeData['categories_array'] = $range_graph_data_categories;
    //    pre($rangeData,1);
        return $rangeData;
    }

}
