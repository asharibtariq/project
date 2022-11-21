<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPhysicalTarget extends Model
{
    use HasFactory;
    protected $table = "tbl_physical_target";
    protected $fillable = [
        'id',
        'project_id',
        'fiscal_year',
        'component_id',
        'component',
        'physical_description',
        'currency_id',
        'currency',
        'amount',
        'start_date',
        'end_date',
        'target_status',
        'status',
        'created_by',
        'updated_by'
    ];
}
