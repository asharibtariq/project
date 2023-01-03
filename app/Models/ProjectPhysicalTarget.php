<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPhysicalTarget extends Model
{
    use HasFactory;
    protected $table = "tbl_project_physical_target";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'fiscal_year',
        'component_id',
        'component',
        'physical_description',
        'currency_id',
        'currency',
        'amount',
        'date',
        'start_date',
        'end_date',
        'target_status',
        'consumed_budget',
        'act_start_date',
        'act_end_date',
        'reason',
        'status',
        'created_by',
        'updated_by'
    ];
}
