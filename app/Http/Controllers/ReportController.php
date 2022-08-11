<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function create()
    {
        $title = "Add Report";
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['project_select'] = get_project();
        return view('adminpanel.report.add_report', $data)->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $userId = Auth::id();
        $insertData = $request->all();
            $insertData['created_by'] = $userId;
            $insertData['updated_by'] = $userId;
//            $insertData['alloc_rupee'] = $insertData['alloc_rupee'] > 0 ? $insertData['alloc_rupee'] : 0;
//            $insertData['alloc_foreign'] = $insertData['alloc_foreign'] > 0 ? $insertData['alloc_foreign'] : 0;
//            $insertData['alloc_revised'] = $insertData['alloc_revised'] > 0 ? $insertData['alloc_revised'] : 0;
//            $insertData['release_fund_auth'] = $insertData['release_fund_auth'] > 0 ? $insertData['release_fund_auth'] : 0;
//            $insertData['release_fund_actual'] = $insertData['release_fund_actual'] > 0 ? $insertData['release_fund_actual'] : 0;
//            $insertData['util_actual'] = $insertData['util_actual'] > 0 ? $insertData['util_actual'] : 0;
//            $insertData['util_actual'] = $insertData['util_actual'] > 0 ? $insertData['util_actual'] : 0;

            Report::create($insertData);
//        $report = new Report();
//         $insertData['alloc_rupee'] > 0 ? $insertData['alloc_rupee'] : 0;
//        $report->alloc_foreign = $insertData['alloc_foreign'] > 0 ? $report->alloc_foreign : 0;
//        $report->alloc_revised = $insertData['alloc_revised'] > 0 ? $report->alloc_revised : 0;
//        $report->release_fund_auth = $insertData['release_fund_auth'] > 0 ? $report->release_fund_auth : 0;
//        $report->release_fund_actual = $insertData['release_fund_actual'] > 0 ? $report->release_fund_actual : 0;
//        $report->release_foreign = $insertData['release_foreign'] > 0 ? $report->release_foreign : 0;
//        $report->release_total_actual = $insertData['release_total_actual'] > 0 ? $report->release_total_actual : 0;
//        $report->util_actual = $insertData['util_actual'] > 0 ? $report->util_actual : 0;
//        $report->util_foreign = $insertData['util_foreign'] > 0 ? $report->util_foreign : 0;
//        $report->util_total = $insertData['util_total'] > 0 ? $report->util_total : 0;
//        $report->amt_surrender = $insertData['amt_surrender'] > 0 ? $report->amt_surrender : 0;
//        $report->amt_lapsed = $insertData['amt_lapsed'] > 0 ? $report->amt_lapsed : 0;
//        $report->financial_prog = $insertData['financial_prog'] > 0 ? $report->financial_prog : 0;
//        $report->physical_prog = $insertData['physical_prog'] > 0 ? $report->physical_prog : 0;
////        $report->comp_date_pc1 = $insertData['comp_date_pc1'] > 0 ? $report->comp_date_pc1 : 0;
//        $report->comp_date_likely = $insertData['comp_date_likely'] > 0 ? $report->comp_date_likely : 0;
//        $report->remarks = $insertData['remarks'] > 0 ? $report->remarks : 0;
//        $report->note = $insertData['note'] > 0 ? $report->note : 0;

        return redirect('report')->with('success', 'Report Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function edit($id)
    {
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
    public function update(ReportRequest $request, $id)
    {
        $userId = Auth::id();
        $report = Report::findOrFail($id);
        $updateData = $request->all();
    //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
    //    pre($request->all(),1);
        $report->update($updateData);
        return redirect('reprot')->with('success', 'Report Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report= Report::findOrFail($id);
        $report->delete();
        return redirect('report')->with('success', 'Report Successfully Deleted');
    }
}
