<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectComponentNis extends Model
{
    use HasFactory;
    protected $table = "tbl_project_component_nis";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'fiscal_year',
        'component_id',
        'component',
        'comp_amount',
        'currency_id',
        'currency',
        'status',
        'created_by',
        'updated_by'
    ];
}
