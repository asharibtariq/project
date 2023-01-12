<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectIssues;
use App\Models\ProjectPhysicalTarget;
use App\Models\ProjectFinancialProgress;
use App\Models\ProjectPhysicalProgress;
use App\Models\ProjectPhysicalProgressMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectStatusController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function completed_physical_targets($id){
        $title = "Completed Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['target_status'] = 'complete';
        $data['next_page'] = 'edit_physical_targets';
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.physical_targets', $data)->with('title', $title);
    }

    public function not_achieved_physical_targets($id){
        $title = "Not Achieved Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['target_status'] = 'not_achieve';
        $data['next_page'] = 'edit_physical_targets';
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.physical_targets', $data)->with('title', $title);
    }

    public function ongoing_physical_targets($id){
        $title = "Ongoing Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['target_status'] = 'ongoing';
        $data['next_page'] = 'edit_physical_targets';
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.physical_targets', $data)->with('title', $title);
    }

    public function edit_physical_targets($physical_target_id){
        $title = "Edit Physical Target";
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        /*
        $data['fiscal_year_select'] = get_fiscal_year($project->fiscal_year);
        $data['currency_select'] = get_currency($project->currency_id);
        $data['component_select'] = get_component($project->component_id);
        */
        return view('adminpanel.project.status.edit_physical_targets', $data)->with('title', $title);
    }

    public function update_physical_targets(Request $request,$physical_target_id){
        $userId = Auth::id();
        $physical_target = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $updateData = $request->all();
    //    $updateData['slug'] = strtolower(str_replace(' ','_',$updateData['title']));
        $updateData['updated_by'] = $userId;
        $physical_target->update($updateData);
        return redirect('completed_physical_targets_status/'.$request['project_id'])->with('success', 'Project Physical Target Updated Successfully');
    }

    public function financial_progress($id){
        $title = "Financial Progress";
        $data['current_page'] = request()->segment(1);
        $data['next_page'] = 'add_financial_progress_status';
        $data['target_status'] = '';
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.physical_targets', $data)->with('title', $title);
    }

    public function create_financial_progress($physical_target_id){
        $title = "Financial Progress";
        $data['current_page'] = request()->segment(1);
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        $data['fy_select'] = get_fiscal_year($data['physical_target']->fiscal_year);
        $data['component_select'] = get_component();
        return view('adminpanel.project.status.add_financial_progress', $data)->with('title', $title);
    }

    public function store_financial_progress(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
//        $this->validate($request,$rules, $customMessages, [
//            'multimedia' => 'required',
//            'multimedia.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
//        ]);
//        if ($request->hasfile('multimedia')) {
//                $name = $request->file('multimedia')->getClientOriginalName();
//            $request->file('multimedia')->move(public_path() . '/uploads/financialprogress', $name);
//            }
//
//        $insertData['file'] = $name;
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        ProjectFinancialProgress::create($insertData);
    //    return redirect('add_issue_status')->with('success', 'Issue Added Successfully');
        return redirect('financial_progress_status/'.$request['project_id'])->with('success', 'Project Financial     Progress Added Successfully');
    }
    public function physical_progress($id){
        $title = "Physical Progress";
        $data['current_page'] = request()->segment(1);
        $data['next_page'] = 'add_physical_progress_status';
        $data['target_status'] = '';
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.status.physical_targets', $data)->with('title', $title);
    }

    public function create_physical_progress($physical_target_id){
        $title = "Physical Progress";
        $data['current_page'] = request()->segment(1);
        $data['physical_target_id'] = $physical_target_id;
        $data['physical_target'] = ProjectPhysicalTarget::findOrFail($physical_target_id);
        $data['project_id'] = $data['physical_target']['project_id'];
        $data['project'] = Project::findOrFail($data['physical_target']['project_id']);
        $data['fy_select'] = get_fiscal_year();
        $data['component_select'] = get_component();
        return view('adminpanel.project.status.add_physical_progress', $data)->with('title', $title);
    }

    public function store_physical_progress(Request $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $rules = [
            'project' => 'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request,$rules, $customMessages, [
            'multimedia' => 'required',
            'multimedia.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $project = new ProjectPhysicalProgress();
        $project->project_id = $insertData['project_id'];
        $project->project = $insertData['project'];
        $project->physical_target_id = $insertData['physical_target_id'];
        $project->fiscal_year = $insertData['fiscal_year'];
        $project->date = $insertData['date'];
        $project->progress_detail = $insertData['progress_detail'];
        $project->component_id = $insertData['component_id'];
        $project->component = $insertData['component'];
        $project->physical_description = $insertData['physical_description'];
        $project->created_by = $userId;
        $project->updated_by = $userId;
        $project->save();
        $id = $project->id;

        if ($request->hasfile('multimedia')) {

            foreach ($request->file('multimedia') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/physicalprogress', $name);
                $projectmedia = new ProjectPhysicalProgressMedia();
                $projectmedia->physical_progress_id = $id;
                $projectmedia->file = $name;
                $projectmedia->save();
            }
        }
        //    return redirect('add_issue_status')->with('success', 'Issue Added Successfully');
        return redirect('physical_progress_status/'.$request['project_id'])->with('success', 'Project Physical Progress Added Successfully');
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
