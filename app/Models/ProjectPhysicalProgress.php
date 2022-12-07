<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPhysicalProgress extends Model
{
    use HasFactory;
    protected $table = "tbl_project_physical_progress";
    protected $fillable = [
        'id',
        'project_id',
        'project',
        'physical_target_id',
        'fiscal_year',
        'date',
        'progress_detail',
        'component_id',
        'component',
        'physical_description',
        'status',
        'created_by',
        'updated_by'
    ];
}
