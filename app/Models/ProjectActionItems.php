<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectActionItems extends Model{

    use HasFactory;
    protected $table = "tbl_action_items";
    protected $fillable = [
        'project_id',
        'project',
        'physical_target_id',
        'date',
        'component_id',
        'component',
        'action_item',
        'assigned_to',
        'start_date',
        'end_date',
        'status',
        'created_by',
        'updated_by'
    ];

}
