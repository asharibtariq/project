<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPc4 extends Model
{
    use HasFactory;
    protected $table = "tbl_project_pc4";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'preparation_status',
        'preparation_remarks',
        'planning_status',
        'planning_remarks',
        'ministry_status',
        'ministry_remarks',
        'finance_status',
        'finance_remarks',
        'budget_status',
        'budget_remarks',
        'status',
        'created_by',
        'updated_by'
    ];
}
