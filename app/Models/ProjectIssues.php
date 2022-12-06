<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectIssues extends Model
{
    use HasFactory;

    protected $table = 'tbl_project_issues';

    protected $fillable = [
        'project_id',
        'project',
        'component_id',
        'component',
        'date',
        'description',
        'type',
        'status',
        'created_by',
        'updated_by'
    ];
}