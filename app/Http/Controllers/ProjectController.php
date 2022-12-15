<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDirector;
use App\Models\ProjectAllocation;
use App\Models\ProjectRelease;
use App\Models\ProjectFyUtilization;
use App\Models\ProjectComponent;
use App\Models\ProjectComponentNis;
use App\Models\ProjectPhysicalTarget;
use App\Models\ProjectPhysicalTargetStatus;
use App\Models\ProjectPhysicalTargetActionItem;
use App\Models\ProjectPc4;
use App\Models\ProjectEndOfFy;
use App\Models\ProjectFinancialProgress;
use App\Models\ProjectPhysicalProgress;
use App\Models\ProjectPhysicalProgressMedia;
use App\Models\ProjectActionItems;
use App\Models\ProjectIssues;
use Illuminate\Validation\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = "Project";
        return view('adminpanel.project.project')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title = "Add Project";
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['executiveagency_select'] = get_executiveagency();
        $data['currency_select'] = get_currency();
        return view('adminpanel.project.add_project',$data)->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request){
        $userId = Auth::id();
        $insertData = $request->all();
    //    $insertData['slug'] = strtolower(str_replace(' ','_',$insertData['title']));
    //    $insertData['created_by'] = $userId;
    //    $insertData['updated_by'] = $userId;
    //    Project::create($insertData);

        $project = new Project();
        $project->psdp = $insertData['psdp'];
        $project->psid = $insertData['psid'];
        $project->name = $insertData['name'];
        $project->approval_type = $insertData['approval_type'];
        $project->fiscal_year = $insertData['fiscal_year'];
        $project->executiveagency_id = $insertData['executiveagency_id'];
        $project->executiveagency = $insertData['executiveagency'];
        $project->approval_date = $insertData['approval_date'];
        $project->forum = $insertData['forum'];
        $project->cost = $insertData['cost'];
        $project->currency_id = $insertData['currency_id'];
        $project->currency = $insertData['currency'];
        $project->start_date = $insertData['start_date'];
        $project->end_date = $insertData['end_date'];
        $project->created_by = $userId;
        $project->updated_by = $userId;
        $project->save();
        $id = $project->id;

        return redirect('project')->with('success', 'Project Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $project = Project::findOrFail($id);
        $title = "Project Detail";
        $data['project'] = $project;
        $data['fiscal_year_select'] = get_fiscal_year();
        return view('adminpanel.project.projects', $data)->with('title', $title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $project = Project::findOrFail($id);
        $title = "Edit Project";
        $data['project'] = $project;
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['executiveagency_select'] = get_executiveagency($project->executiveagency_id);
        $data['currency_select'] = get_currency($project->currency_id);
        return view('adminpanel.project.edit_project', $data)->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request,$id){
        $userId = Auth::id();
        $project = Project::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('project')->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('project')->with('success', 'Project Successfully Deleted');
    }

    public function action_items($id){
        $title = "Action Items";
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        $data['currency_select'] = get_currency();
        return view('adminpanel.project.action_items.action_items',$data)->with('title', $title);
    }

    public function add_action_item($id){
        $title = "Action Items";
        $data['physical_target_id'] = $id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        $data['component_select'] = get_component();
        return view('adminpanel.project.action_items.add_action_item',$data)->with('title', $title);
    }

    public function store_action_item(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'action_item' => 'required',
            'assigned_to' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectPhysicalTargetActionItem::create($insertData);
        return redirect('action_items/'.$request['physical_target_id'])->with('success', 'Record Added Successfully');
    }

    public function review_action_items($id){
        $title = "Review Action Items";
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.action_items.review_action_items',$data)->with('title', $title);
    }

    public function summary($id){
        $title = "Project Summary";
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        // General Where for all rec
    //    $where['project_id'] = $id;
    //    $where['status'] = "Y";
        ////////////////////////////
        $data['project_allocation'] = ProjectAllocation::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_release'] = ProjectRelease::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_fy_utilization'] = ProjectFyUtilization::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_component_pc1'] = ProjectComponent::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_component_nis'] = ProjectComponentNis::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['completed_project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('target_status','=','complete')->where('status','=','Y');
        $data['not_achieved_project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('target_status','=','not_achieve')->where('status','=','Y');
        $data['on_going_project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('target_status','=','ongoing')->where('status','=','Y');
        $data['project_pc4'] = ProjectPc4::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_end_of_fy'] = ProjectEndOfFy::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_financial_progress'] = ProjectFinancialProgress::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_physical_progress'] = ProjectPhysicalProgress::all()->where('project_id','=',$id)->where('status','=','Y');
        // ProjectPhysicalProgressMedia
        $data['project_physical_target_status'] = ProjectPhysicalTargetStatus::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_action_items'] = ProjectActionItems::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_issues'] = ProjectIssues::all()->where('project_id','=',$id)->where('type','=','issue')->where('status','=','Y');
        $data['project_suggest'] = ProjectIssues::all()->where('project_id','=',$id)->where('type','=','suggest')->where('status','=','Y');
        return view('adminpanel.project.project_summary',$data)->with('title', $title);
    }

}
