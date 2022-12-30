<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFinancialProgress;
use App\Models\ProjectPhysicalProgress;
use App\Models\ProjectPhysicalTarget;
use App\Models\ProjectPhysicalTargetStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectMonitoringController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function ongoing_physical_targets($id){
        $title = "Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['next_page'] = 'add_physical_target_status';
        $data['target_status'] = 'ongoing';
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.monitoring.physical_targets', $data)->with('title', $title);
    }

    public function create_physical_target_status($physical_target_id){
        $title = "Physical Target Status";
        $data['current_page'] = request()->segment(1);
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        return view('adminpanel.project.monitoring.physical_target_status', $data)->with('title', $title);
    }

    public function store_physical_target_status(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'date' => 'required',
            'pace' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectPhysicalTargetStatus::create($insertData);
        return redirect('add_physical_target_status/'.$request['physical_target_id'])->with('success', 'Record Added Successfully');
    }

    public function physical_progress_monitoring($physical_target_id){
        $title = "Physical Progress Monitoring";
        $data['current_page'] = request()->segment(1);
        $data['next_page'] = 'edit_physical_progress';
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        return view('adminpanel.project.monitoring.physical_progress_monitoring', $data)->with('title', $title);
    }
    public function edit_physical_progress($id){
        $physical_progress = ProjectPhysicalProgress::findOrFail($id);
        $title = "Edit Physical Target";
        $data['fiscal_year_select'] = get_fiscal_year($physical_progress->fiscal_year);
        $data['currency_select'] = get_currency($physical_progress->currency_id);
        $data['component_select'] = get_component($physical_progress->component_id);
        $data['physical_progress'] = $physical_progress;
        return view('adminpanel.project.monitoring.edit_physical_progress', $data)->with('title', $title);
    }

    public function update_physical_progress(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectPhysicalProgress::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('physical_progress_monitoring/'.$request['physical_target_id'])->with('success', 'Project Physical Progress Updated Successfully');
    }

    public function financial_progress_monitoring($physical_target_id){
        $title = "Financial Progress Monitoring";
        $data['current_page'] = request()->segment(1);
        $data['next_page'] = 'edit_financial_progress';
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        return view('adminpanel.project.monitoring.financial_progress_monitoring', $data)->with('title', $title);
    }

    public function edit_financial_progress($id){
        $financial_progress = ProjectFinancialProgress::findOrFail($id);
        $title = "Edit Physical Target";
        $data['fiscal_year_select'] = get_fiscal_year($financial_progress->fiscal_year);
        $data['currency_select'] = get_currency($financial_progress->currency_id);
        $data['component_select'] = get_component($financial_progress->component_id);
        $data['financial_progress'] = $financial_progress;
        return view('adminpanel.project.monitoring.edit_financial_progress', $data)->with('title', $title);
    }

    public function update_financial_progress(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectFinancialProgress::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $this->validate($request, [
            'multimedia' => 'required',
            'multimedia.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasfile('multimedia')) {
            $name = $request->file('multimedia')->getClientOriginalName();
            $request->file('multimedia')->move(public_path() . '/uploads/financialprogress', $name);
        }

        $updateData['file'] = $name;
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('financial_progress_monitoring/'.$request['physical_target_id'])->with('success', 'Project Financial Progress Updated Successfully');
    }
    public function create_issue($physical_target_id){
        $title = "Add Issue";
        $data['current_page'] = request()->segment(1);
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        $data['component_select'] = get_component();
        return view('adminpanel.project.monitoring.add_issue',$data)->with('title', $title);
    }

    public function store_issue(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project' => 'required',
            'description' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['type'] = 'issue';
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectIssues::create($insertData);
        //    return redirect('add_issue_status')->with('success', 'Issue Added Successfully');
        return redirect()->back()->with('success', 'Issue Added Successfully');
    }

    public function create_suggestion($physical_target_id){
        $title = "Add Suggestion";
        $data['current_page'] = request()->segment(1);
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        $data['component_select'] = get_component();
        return view('adminpanel.project.monitoring.add_suggestion',$data)->with('title', $title);
    }

    public function store_suggestion(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project' => 'required',
            'description' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['type'] = 'suggest';
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectIssues::create($insertData);
        //    return redirect('add_suggestion_status')->with('success', 'Issue Added Successfully');
        return redirect()->back()->with('success', 'Suggestion Added Successfully');
    }

}
