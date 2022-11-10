<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectComponent extends Model
{
    use HasFactory;
    protected $table = "tbl_component";
    protected $fillable = [
        'id',
        'project_id',
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
