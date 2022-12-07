<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectIssues;
use App\Models\ProjectPhysicalTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectStatusController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function completed_physical_targets($id){
        $title = "Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.completed_physical_targets', $data)->with('title', $title);
    }

    public function not_achieved_physical_targets($id){
        $title = "Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.not_achieved_physical_targets', $data)->with('title', $title);
    }

    public function ongoing_physical_targets($id){
        $title = "Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.ongoing_physical_targets', $data)->with('title', $title);
    }

    public function edit_physical_targets($id){
        $project = ProjectPhysicalTarget::findOrFail($id);
        $title = "Edit Physical Target";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.status.edit_physical_targets', $data)->with('title', $title);
    }

    public function update_physical_targets(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectPhysicalTarget::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('completed_physical_target_status/'.$request['project_id'])->with('success', 'Project Physical Target Updated Successfully');
    }

    public function create_issue($id){
        $title = "Add Issue";
        $data['current_page'] = request()->segment(1);
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        $data['component_select'] = get_component();
        return view('adminpanel.project.status.add_issue',$data)->with('title', $title);
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

    public function create_suggestion($id){
        $title = "Add Suggestion";
        $data['current_page'] = request()->segment(1);
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        $data['component_select'] = get_component();
        return view('adminpanel.project.status.add_suggestion',$data)->with('title', $title);
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
