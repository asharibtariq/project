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
        $role_id = Auth::user()->role_id;
        $data['role_id'] = $role_id;
        return view('adminpanel.project.project', $data)->with('title', $title);
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
        $name = $project->name;

        $pc4 = new ProjectPc4();
        $pc4->project_id = $id;
        $pc4->project_name = $name;
        $pc4->save();

        $pd = new ProjectDirector();
        $pd->project_id = $id;
        $pd->project_name = $name;
        $pd->save();

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

    public function create_physical_target($id, $target_status){
        $title = "Physical Target";
        $data['current_page'] = request()->segment(1);
        $project = Project::findOrFail($id);
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['target_status'] = $target_status != '' ? $target_status : 'ongoing';
        $data['project_id'] = $id;
        $data['project'] = $project;
        $data['component_select'] = get_component();
        return view('adminpanel.project.add_physical_target', $data)->with('title', $title);
    }

    public function store_physical_target(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'start_date' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        //////////////////////////////////////////
        $insertData['date'] = date("m/d/Y");
        //////////////////////////////////////////
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectPhysicalTarget::create($insertData);
        return redirect()->back()->with('success', 'Record Added Successfully');
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
        $insertData['date'] = date('m/d/Y');
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectActionItems::create($insertData);
        return redirect('action_items/'.$request['project_id'])->with('success', 'Record Added Successfully');
    }

    public function edit_action_item($id){
        $title = "Edit Action Item";
        $data['action_items'] = ProjectActionItems::findOrFail($id);
        return view('adminpanel.project.action_items.edit_action_item', $data)->with('title', $title);
    }

    public function update_action_item(Request $request, $id){
        $userId = Auth::id();
        $updateData = $request->all();
        $rules = ['action_item' => 'required'];
        $customMessages = ['required' => 'The :attribute field is required.'];
        $this->validate($request, $rules, $customMessages);
        $action_items = ProjectActionItems::findOrFail($id);
        $updateData['updated_by'] = $userId;
        $action_items->update($updateData);
        return redirect('add_action_item/'.$action_items->physical_target_id)->with('success', 'Action Item Updated Successfully');
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
        $data['project_pd'] = ProjectDirector::where('project_id', '=', $id)->firstOrFail();
        $data['project_allocation'] = ProjectAllocation::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_release'] = ProjectRelease::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_fy_utilization'] = ProjectFyUtilization::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_component_pc1'] = ProjectComponent::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_component_nis'] = ProjectComponentNis::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['completed_project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('target_status','=','complete')->where('status','=','Y');
        $data['not_achieved_project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('target_status','=','not_achieve')->where('status','=','Y');
        $data['on_going_project_physical_target'] = ProjectPhysicalTarget::all()->where('project_id','=',$id)->where('target_status','=','ongoing')->where('status','=','Y');
        $data['project_pc4'] = ProjectPc4::where('project_id', '=', $id)->firstOrFail();
        $data['project_end_of_fy'] = ProjectEndOfFy::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_financial_progress'] = ProjectFinancialProgress::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_physical_progress'] = ProjectPhysicalProgress::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_physical_progress_media'] = ProjectPhysicalProgressMedia::all()->where('project_id','=',$id)->where('status','=','Y');
        // ProjectPhysicalProgressMedia
        $data['project_physical_target_status'] = ProjectPhysicalTargetStatus::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_action_items'] = ProjectActionItems::all()->where('project_id','=',$id)->where('status','=','Y');
        $data['project_issues'] = ProjectIssues::all()->where('project_id','=',$id)->where('type','=','issue')->where('status','=','Y');
        $data['project_suggest'] = ProjectIssues::all()->where('project_id','=',$id)->where('type','=','suggest')->where('status','=','Y');
        return view('adminpanel.project.project_summary',$data)->with('title', $title);
    }

}
