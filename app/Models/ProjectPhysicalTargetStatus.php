<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPhysicalTargetStatus extends Model
{
    use HasFactory;
    protected $table = "tbl_project_physical_target_status";
    protected $fillable = [
        'id',
        'project_id',
        'project',
        'physical_target_id',
        'date',
        'inspect_date',
        'pace',
        'status',
        'created_by',
        'updated_by'
    ];
}
