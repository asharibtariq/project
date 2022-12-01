<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectAllocation;
use App\Models\ProjectComponent;
use App\Models\ProjectComponentNis;
use App\Models\ProjectDirector;
use App\Models\ProjectFyUtilization;
use App\Models\ProjectPc4;
use App\Models\ProjectPhysicalTarget;
use App\Models\ProjectRelease;
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
        ProjectPhysicalTarget::create($insertData);
        return redirect('action_items/'.$request['physical_target_id'])->with('success', 'Record Added Successfully');
    }

    public function summary($id){
        $title = "Project Summary";
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.project_summary',$data)->with('title', $title);
    }

}
