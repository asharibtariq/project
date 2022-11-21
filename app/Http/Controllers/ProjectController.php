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

    public function project_director($id){
        $title = "Project Director";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['project_id'] = $id;
        $data['designation_select'] = get_designation();
        $data['organization_select'] = get_organization();
        return view('adminpanel.project.tabs.project_director', $data)->with('title', $title);
    }
    public function add_project_director(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'wef_date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectDirector::create($insertData);
        return redirect('add_project_director'.$request['project_id'])->with('success', 'Project Director Added Successfully');
    }

    public function allocation($id){
        $title = "Allocation";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['project_id'] = $id;
        $data['currency_select'] = get_currency();
        return view('adminpanel.project.tabs.allocation', $data)->with('title', $title);
    }

    public function add_allocation(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'alloc_date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectAllocation::create($insertData);
        return redirect('add_project_allocation/'.$request['project_id'])->with('success', 'Allocation Added Successfully');
    }

    public function release($id){
        $title = "Release";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        return view('adminpanel.project.tabs.release', $data)->with('title', $title);
    }

    public function add_release(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'release_date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectRelease::create($insertData);
        return redirect('add_release/'.$request['project_id'])->with('success', 'Project Release Added Successfully');
    }

    public function component_pc1($id){
        $title = "Component as per PC-1";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['component_select'] = get_component();
        return view('adminpanel.project.tabs.component_pc1', $data)->with('title', $title);
    }
    public function add_component_pc1(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'comp_amount' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectComponent::create($insertData);
        return redirect('add_component_pc1/'.$request['project_id'])->with('success', 'Project Component Added Successfully');
    }


    public function component_nis($id){
        $title = "Component as per NIS";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['component_select'] = get_component();
        return view('adminpanel.project.tabs.component_nis', $data)->with('title', $title);
    }
    public function add_component_nis(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'comp_amount' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectComponentNis::create($insertData);
        return redirect('add_component_nis/'.$request['project_id'])->with('success', 'Project Component Nis Added Successfully');
    }


    public function fy_util($id){
        $title = "FY wise Utilization";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['component_select'] = get_component();
        return view('adminpanel.project.tabs.fy_util', $data)->with('title', $title);
    }
    public function add_fy_util(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'fy_date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectFyUtilization::create($insertData);
        return redirect('add_fy_util/'.$request['project_id'])->with('success', 'FY Utilization Added Successfully');
    }

    public function physical_target($id){
        $title = "Physical Target";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['component_select'] = get_component();
        return view('adminpanel.project.tabs.physical_target', $data)->with('title', $title);
    }

    public function add_physical_target(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'start_date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectPhysicalTarget::create($insertData);
        return redirect('add_physical_target/'.$request['project_id'])->with('success', 'FY Utilization Added Successfully');
    }
    public function pc4($id){
        $title = "PC-4 Details";
        $data['project_id'] = $id;
        $data['current_page'] = request()->segment(1);
        return view('adminpanel.project.tabs.pc4', $data)->with('title', $title);
    }
    public function add_pc4(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'preparation_status' => 'required',
            'ministry_status' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectPc4::create($insertData);
        return redirect('add_pc4/'.$request['project_id'])->with('success', 'Pc4 Added Successfully');
    }


    public function end_of_fy($id){
        $title = "End of FY";
        $data['project_id'] = $id;
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        return view('adminpanel.project.tabs.end_of_fy', $data)->with('title', $title);
    }

}
