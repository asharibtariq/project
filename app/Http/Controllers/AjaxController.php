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
                $name = $request->name != '' ? $request->name : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_project.title'] = $title;
                */
                $project = DB::table('tbl_project')
                    ->select('tbl_project.id',
                        'tbl_project.psdp',
                        'tbl_project.psid',
                        'tbl_project.name',
                        'tbl_project.cost',
                        'tbl_project.complete_date',
                        'tbl_project.status',
                        'tbl_project.created_at',
                        'tbl_project.updated_at')
                    ->where('name', 'LIKE', '%' . $name . '%')
                //    ->groupBy('tbl_project.id')
                    ->orderBy('tbl_project.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.project_list')->with($data);
                break;
            case 'single_project_content':
                $where = array();
                $project_id = $request->project_id != '' ? $request->project_id : '';
                $fiscal_year = $request->fiscal_year != '' ? $request->fiscal_year : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                /*
                    if (!empty($title))
                        $where['tbl_report.title'] = $title;
                */
                $project = DB::table('tbl_report')
                    ->select('tbl_report.id',
                        'tbl_report.project_id',
                        'tbl_report.project',
                        'tbl_report.alloc_rupee',
                        'tbl_report.alloc_foreign',
                        'tbl_report.alloc_revised',
                        'tbl_report.release_fund_auth',
                        'tbl_report.release_fund_actual',
                        'tbl_report.release_foreign',
                        'tbl_report.release_total_actual',
                        'tbl_report.util_actual',
                        'tbl_report.util_foreign',
                        'tbl_report.util_total',
                        'tbl_report.amt_surrender',
                        'tbl_report.amt_lapsed',
                        'tbl_report.financial_prog',
                        'tbl_report.physical_prog',
                        'tbl_report.comp_date_likely',
                        'tbl_report.remarks',
                        'tbl_report.note')
                    ->where('tbl_report.project_id', '=', $project_id)
                //    ->groupBy('tbl_report.id')
                    ->orderBy('tbl_report.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.project.single_project_list')->with($data);
                break;
            case 'report_content':
                $where = array();
                $project_id = $request->project_id != '' ? $request->project_id : '';
                $fiscal_year = $request->fiscal_year != '' ? $request->fiscal_year : '';
                $per_page = $request->select_limit != '' ? $request->select_limit : 10;
                if (!empty($title))
                    $where['tbl_report.project_id'] = $project_id;
                if (!empty($title))
                    $where['tbl_report.fiscal_year'] = $fiscal_year;
                $project = DB::table('tbl_report')
                    ->select('tbl_report.id',
                        'tbl_report.fiscal_year',
                        'tbl_report.project_id',
                        'tbl_report.project',
                        'tbl_report.actual_expend',
                        'tbl_report.alloc_rupee',
                        'tbl_report.alloc_foreign',
                        'tbl_report.alloc_revised',
                        'tbl_report.release_fund_auth',
                        'tbl_report.release_fund_actual',
                        'tbl_report.release_foreign',
                        'tbl_report.release_total_actual',
                        'tbl_report.util_actual',
                        'tbl_report.util_foreign',
                        'tbl_report.util_total',
                        'tbl_report.amt_surrender',
                        'tbl_report.amt_lapsed',
                        'tbl_report.financial_prog',
                        'tbl_report.physical_prog',
                        'tbl_report.comp_date_likely',
                        'tbl_report.remarks',
                        'tbl_report.note')
                    ->where($where)
                //    ->groupBy('tbl_report.id')
                    ->orderBy('tbl_report.id', 'DESC')
                    ->paginate($per_page);

                $data['result'] = $project->items();
                $data['links'] = $project;
                return view('adminpanel.report.report_list')->with($data);
                break;
            default:
                break;
        }
    }

}
