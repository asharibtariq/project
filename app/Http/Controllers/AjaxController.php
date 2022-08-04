<?php
namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\elementType;

class AjaxController extends Controller{

    public function __construct(){
    //    $this->middleware('auth');
    }

    public function content(Request $request){
        $action = $request->action;
        $data ['action'] = $action;
        $output = [];
        switch ($action) {
            case 'project_content':
                $where = array();
                $title = $request->title != '' ? $request->title : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_project')
                    ->select('tbl_project.id',
                        'tbl_project.name',
                        'tbl_project.cost',
                        'tbl_project.status',
                        'tbl_project.created_at',
                        'tbl_project.updated_at')
                    ->where('name', 'LIKE', '%' . $title . '%')
                //    ->groupBy('tbl_project.id')
                    ->orderBy('tbl_project.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.project_list')->with($data);
                break;
            default:
                break;
        }
    }

}
