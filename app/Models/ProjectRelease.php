<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRelease extends Model
{
    use HasFactory;
    protected $table = "tbl_project_release";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'fiscal_year',
        'quarter',
        'release_date',
        'rel_amount',
        'currency_id',
        'currency',
        'foreign_rel_amount',
        'status',
        'created_by',
        'updated_by'
    ];
}
