<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        return redirect('physical_target_status_monitoring/'.$request['physical_target_id'])->with('success', 'Record Added Successfully');
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
