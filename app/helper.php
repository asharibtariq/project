<?php
// Run command "composer dump-autoload"
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

if(!function_exists('show_dropdown')) {
    function show_dropdown($table_name, $s_name, $o_name, $o_id = "id", $selected = 0, $default_select = '', $attr = '', $where = '', $sort_order = '', $group_by = '') {
        $output = '';
    //    $where = ($where != "") ? $where : "";
    //    $group_by = ($group_by != "") ? $group_by : "";
        $sort_order = ($sort_order != "") ? " ORDER BY $sort_order" : "";
    //    $sql = "SELECT * FROM " . $CI->db->dbprefix . $table_name . " $where $sort_order $group_by";
    //    $query = $CI->db->query($sql);

        if(!empty($where) && !empty($group_by)){
            $query = DB::table($table_name)
                ->select(DB::raw('*'))
                ->where($where)
                ->groupBy($group_by)
                ->get();
        }

        if(!empty($group_by)){
            $query = DB::table($table_name)
                ->select(DB::raw('*'))
                ->groupBy($group_by)
                ->get();
        }

        if(!empty($where)){
            $query = DB::table($table_name)
                ->select(DB::raw('*'))
                ->where($where)->get();
        }

        if (empty($where)) {
            $query = DB::table($table_name)
                ->select(DB::raw('*'))->get();
        }

        if (substr($s_name, -2) == "[]")
            $s_name_id = str_replace("]", "", str_replace("[", "", $s_name));
        else
            $s_name_id = $s_name;
        $output .= "<select id='" . $s_name_id . "' name='" . $s_name . "' " . $attr . " >";
        if ($default_select != "")
            $output .= "<option value=''>" . $default_select . "</option>";
        foreach ($query as $o) {
            if(is_array($selected) && in_array($o->$o_id, $selected)){
                $output .= "<option selected=\"selected\" value=\"" . $o->$o_id . "\" >" . ucfirst($o->$o_name) . "</option>";
            }else if ($o->$o_id == $selected ){
                $output .= "<option selected=\"selected\" value=\"" . $o->$o_id . "\" >" . ucfirst($o->$o_name) . "</option>";
            }else{
                $output .= "<option value=\"" . $o->$o_id . "\" >" . ucfirst($o->$o_name) . "</option>";
            }
        }
        $output .= "</select>";
        return $output;
    }
}

if(!function_exists('pre')) {
    function pre($arr, $e = 0, $msg = '', $isHidden = 0){
        if ($isHidden) {
            echo "<!--";
        }
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        if ($msg != '') {
            echo $msg;
        }
        if ($e == 1) {
            exit;
        }
        if ($isHidden) {
            echo "-->";
        }
    }
}

if(!function_exists('contact_send_email')) {
    function contact_send_email($data = array()) {
        app('App\Http\Controllers\MailController')->html_email('contact_mail', $data);
    }
}

if(!function_exists('loggedIn')) {
    function loggedIn($data = array()) {
        $data['user_id'] = Auth::id();
        $data['role_id'] = Auth::user()->role_id;
        return $data;
    }
}

if(!function_exists('getUserProjects')) {
    function getUserProjects($user_id) {
        $data = array();
        $projects = DB::table('tbl_users_project')
            ->select(DB::raw('project_id'))
            ->where('user_id', $user_id)
            ->get();
        if (!empty($projects) && count($projects) > 0){
            foreach ($projects as $project){
                $data[] = $project->project_id;
            }
        }
        return $data;
    }
}

if(!function_exists('tbl_role')) {
    function get_role($default = 0, $where = '', $name = 'role_id') {
        if (empty($where)){$where = array('status' => 'Y');}
        $html = show_dropdown('tbl_role', $name, 'name', 'id', $default, "Select Role", "class='form-control input-paf select2' required", $where);
        return $html;
    }
}

if(!function_exists('get_project')) {
    function get_project($default = 0, $where = '', $name = 'project_id') {
        if (empty($where)){$where = array('status' => 'Y');}
        $html = show_dropdown('tbl_project', $name, 'name', 'id', $default, "Select Project", "class='form-control input-paf select2' required", $where);
        return $html;
    }
}

if(!function_exists('get_multiple_project')) {
    function get_multiple_project($default = 0, $where = '', $name = 'project_id[]') {
        if (empty($where)){$where = array('status' => 'Y');}
        $html = show_dropdown('tbl_project', $name, 'name', 'id', $default, "Select Project(s)", "class='form-control input-paf select2' multiple required", $where);
        return $html;
    }
}

if(!function_exists('get_currency')) {
    function get_currency($default = 0, $where = '', $name = 'currency_id') {
        if (empty($where)){$where = array('status' => 'Y');}
        $html = show_dropdown('tbl_currency', $name, 'name', 'id', $default, "Select Currency", "class='form-control input-paf select2' required", $where);
        return $html;
    }
}

if(!function_exists('get_fiscal_year')) {
    function get_fiscal_year($default = 0, $where = '', $name = 'fiscal_year', $attr = '') {
        $html = '';
        $start_date = 2015;
        $end_date = date('Y') + 1;
        $default_select = 'Select';
        if (substr($name, -2) == "[]")
            $name_id = str_replace("]", "", str_replace("[", "", $name));
        else
            $name_id = $name;
        $html .= "<select id='" . $name_id . "' name='" . $name . "' class='form-control input-paf select2' required " . $attr . " >";
        $html .= "<option value=''>" . $default_select . "</option>";
        for ($i = $end_date; $i > $start_date; $i--) {
            $date_minus_one = $i - 1;
            $fy_date_formate = $date_minus_one.' - '.$i;
            if ($default > 0){
                $html .= "<option selected=\"selected\" value=\"" . $i . "\" >" . $fy_date_formate . "</option>";
            }else{
                $html .= "<option value=\"" . $i . "\" >" . $fy_date_formate . "</option>";
            }
        }
        $html .= "</select>";
        return $html;
    }
}

if(!function_exists('getsinglefield')) {
    function getsinglefield($tbl, $field, $where = '') {
        $result = DB::select("SELECT $field FROM " . $tbl. " ".$where);
        return $result[0]->$field;
//        $CI = & get_instance();
//        $result = $CI->db->query("SELECT $field FROM " . $CI->db->dbprefix . $tbl . " $where");
//        $result = $result->row();
//        return $result->$field;
    }
}

?>