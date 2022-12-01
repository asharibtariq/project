<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectAllocation;
use App\Models\ProjectComponent;
use App\Models\ProjectComponentNis;
use App\Models\ProjectDirector;
use App\Models\ProjectEndOfFy;
use App\Models\ProjectFyUtilization;
use App\Models\ProjectPc4;
use App\Models\ProjectPhysicalTarget;
use App\Models\ProjectRelease;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function project_director($id){
        $title = "Project Director";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_project_director($id){
        $project = ProjectDirector::findOrFail($id);
        $title = "Edit Project Director";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_project_director', $data)->with('title', $title);
    }

    public function update_project_director(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectDirector::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_project_director/'.$request['project_id'])->with('success', 'Project Director Updated Successfully');
    }

    public function allocation($id){
        $title = "Allocation";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_allocation($id){
        $project = ProjectAllocation::findOrFail($id);
        $title = "Edit Project Allocation";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_project_allocation', $data)->with('title', $title);
    }

    public function update_allocation(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectAllocation::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_project_allocation/'.$request['project_id'])->with('success', 'Project Allocation Updated Successfully');
    }

    public function release($id){
        $title = "Release";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_release($id){
        $project = ProjectRelease::findOrFail($id);
        $title = "Edit Project Release";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_release', $data)->with('title', $title);
    }

    public function update_release(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectRelease::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_release/'.$request['project_id'])->with('success', 'Project Release Updated Successfully');
    }

    public function component_pc1($id){
        $title = "Component as per PC-1";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_component_pc1($id){
        $project = ProjectComponent::findOrFail($id);
        $title = "Edit Project ComponentPc1";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_component_pc1', $data)->with('title', $title);
    }

    public function update_component_pc1(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectComponent::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_component_pc1/'.$request['project_id'])->with('success', 'Project ComponentPc1 Updated Successfully');
    }

    public function component_nis($id){
        $title = "Component as per NIS";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_component_nis($id){
        $project = ProjectComponentNis::findOrFail($id);
        $title = "Edit Project Component Nis";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_component_nis', $data)->with('title', $title);
    }

    public function update_component_nis(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectComponentNis::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_component_nis/'.$request['project_id'])->with('success', 'Project ComponentNis Updated Successfully');
    }



    public function fy_util($id){
        $title = "FY wise Utilization";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_fy_util($id){
        $project = ProjectFyUtilization::findOrFail($id);
        $title = "Edit Fy Utilization";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_fy_util', $data)->with('title', $title);
    }

    public function update_fy_util(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectFyUtilization::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_fy_util/'.$request['project_id'])->with('success', 'Project FY Util Updated Successfully');
    }

    public function physical_target($id){
        $title = "Physical Target";
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select'] = get_currency();
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
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
    public function edit_physical_target($id){
        $project = ProjectPhysicalTarget::findOrFail($id);
        $title = "Edit Physical Target";
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        $data['project'] = $project;
        return view('adminpanel.project.tabs.edit_physical_target', $data)->with('title', $title);
    }

    public function update_physical_target(Request $request,$id){
        $userId = Auth::id();
        $project = ProjectPhysicalTarget::findOrFail($id);
        $updateData = $request->all();
        //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        //    pre($request->all(),1);
        $project->update($updateData);
        return redirect('add_physical_target/'.$request['project_id'])->with('success', 'Project Physical Target Updated Successfully');
    }


    public function pc4($id){
        $title = "PC-4 Details";
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        $data['current_page'] = request()->segment(1);
        return view('adminpanel.project.tabs.pc4', $data)->with('title', $title);
    }
    public function add_pc4(Request $request)
    {
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'ministry_status' => 'required',
//            'start_date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectPc4::create($insertData);
        return redirect('add_pc4/' . $request['project_id'])->with('success', 'Pc4 Added Successfully');
    }


    public function end_of_fy($id){
        $title = "End of FY";
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        $data['current_page'] = request()->segment(1);
        $data['fiscal_year_select'] = get_fiscal_year();
        $data['currency_select_surrender'] = get_currency(0,'','currency_id_surrender');
        $data['currency_select_lapsed'] = get_currency(0,'','currency_id_lapsed');
        return view('adminpanel.project.tabs.end_of_fy', $data)->with('title', $title);
    }
    public function add_end_of_fy(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project_id' => 'required',
            'fiscal_year' => 'required',
            'date' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectEndOfFy::create($insertData);
        return redirect('add_end_of_fy/'.$request['project_id'])->with('success', 'End of FY Added Successfully');
    }
}
