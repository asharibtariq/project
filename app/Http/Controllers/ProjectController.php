<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Report;
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
        return view('adminpanel.project.add_project')->with('title', $title);
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
        $project->cost = $insertData['cost'];
        $project->complete_date = $insertData['complete_date'];
        $project->created_by = $userId;
        $project->updated_by = $userId;
        $project->save();
        $id = $project->id;

        /*
        $report = new Report();
        $report->project_id = $id;
        $report->project = $insertData['name'];
        $report->created_by = $userId;
        $report->save();
        */

        return redirect('add_report')->with('success', 'Project Added Successfully');
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
}
