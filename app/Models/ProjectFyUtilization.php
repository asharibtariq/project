<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFyUtilization extends Model
{
    use HasFactory;
    protected $table = "tbl_project_fy_util";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'fiscal_year',
        'quarter',
        'fy_date',
        'component_id',
        'component',
        'fy_amount',
        'currency_id',
        'currency',
        'foreign_fy_amount',
        'status',
        'created_by',
        'updated_by'
    ];
}
