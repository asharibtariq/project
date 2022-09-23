<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = "Report";
        $data['project_select'] = get_project();
        $data['fiscal_year_select'] = get_fiscal_year();
        return view('adminpanel.report.report', $data)->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title = "Add Report";
        $projects_where = '';
        $userData = loggedIn();
        $user_id = $userData['user_id'];
        $user_role = $userData['role_id'];
        if ($user_role == 2) {
            $projects_array = getUserProjects($user_id);
            $projects_string = implode(',',$projects_array);
            $projects_where = "id IN (".$projects_string.")";
        //    $projects_where = ["id", "IN" ,"(".$projects_string.")"];
        }
    //    pre($projects_where,1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['project_select'] = get_project($projects_where);
        return view('adminpanel.report.add_report', $data)->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        $insertData['status'] = 'Y';
        $report = new Report();
        $report->fiscal_year = $insertData['fiscal_year'];
        $report->project_id = $insertData['project_id'];
        $report->project = $insertData['project'];
        $report->date = $insertData['date'];
        $report->alloc_rupee = $insertData['alloc_rupee'];
        $report->alloc_foreign = $insertData['alloc_foreign'];
        $report->alloc_revised = $insertData['alloc_revised'];
        $report->alloc_total = $insertData['alloc_total'];
        $report->release_fund_auth = $insertData['release_fund_auth'];
        $report->release_fund_actual = $insertData['release_fund_actual'];
        $report->release_foreign = $insertData['release_foreign'];
        $report->release_total_actual = $insertData['release_total_actual'];
        $report->util_actual = $insertData['util_actual'];
        $report->util_foreign = $insertData['util_foreign'];
        $report->util_total = $insertData['util_total'];
        $report->amt_surrender = $insertData['amt_surrender'];
        $report->amt_lapsed = $insertData['amt_lapsed'];
        $report->financial_prog = $insertData['financial_prog'];
        $report->physical_prog = $insertData['physical_prog'];
        $report->physical_prog_desc = $insertData['physical_prog_desc'];
        $report->comp_date_likely = $insertData['comp_date_likely'];
        $report->remarks = $insertData['remarks'];
        $report->note = $insertData['note'];
        $report->status = 'Y';
        $report->created_by = $userId;
        $report->updated_by = $userId;
        $report->save();
        $report_id = $report->id;



        $log = new Log();
        $log->report_id = $report_id;
        $log->project_id = $insertData['project_id'];
        $log->project = $insertData['project'];
        $log->data = json_encode($insertData);
        $log->user_id = $userId;
        $log->action = 'add';
        $log->save();
        $id = $log->id;


        return redirect('report')->with('success', 'Report Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $report = Report::findOrFail($id);
        $title = "Report Detail";
        $data['report'] = $report;
        $data['fiscal_year_select'] = get_fiscal_year();
        return view('adminpanel.report.report', $data)->with('title', $title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $report = Report::findOrFail($id);
        $title = "Edit Report";
        $data['report'] = $report;
        $data['fiscal_year_select'] = get_fiscal_year($report->fiscal_year);
        return view('adminpanel.report.edit_report', $data)->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(ReportRequest $request, $id){
        $userId = Auth::id();
        $report = Report::findOrFail($id);
        $updateData = $request->all();

        $log = new Log();
        $log->report_id = $updateData['report_id'];
        $log->project_id = $updateData['project_id'];
        $log->project = $updateData['project'];
        $log->data = json_encode($updateData);
        $log->user_id = $userId;
        $log->action = 'edit';
        $log->save();

    //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
    //    pre($request->all(),1);
        $report->update($updateData);

        return redirect('report')->with('success', 'Report Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $userId = Auth::id();

        $report= Report::findOrFail($id);

        $log = new Log();
        $log->report_id = $report['id'];
        $log->project_id = $report['project_id'];
        $log->project = $report['project'];
        $log->data = json_encode($report);
        $log->user_id = $userId;
        $log->action = 'delete';
        $log->save();

        $report->delete();
        return redirect('report')->with('success', 'Report Successfully Deleted');
    }
}
