<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectMonitoringController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function ongoing_physical_targets($id){
        $title = "Physical Targets";
        $data['current_page'] = request()->segment(1);
        $data['project_id'] = $id;
        $data['project'] = Project::findOrFail($id);
        return view('adminpanel.project.monitoring.ongoing_physical_targets', $data)->with('title', $title);
    }

}
