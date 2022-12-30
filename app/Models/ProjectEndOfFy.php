<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEndOfFy extends Model
{
    use HasFactory;
    protected $table = "tbl_project_end_of_fy";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'fiscal_year',
        'date',
        'local_amount_surrender',
        'currency_id_surrender',
        'currency_surrender',
        'foreign_amount_surrender',
        'local_amount_lapsed',
        'currency_id_lapsed',
        'currency_lapsed',
        'foreign_amount_lapsed',
        'financial_progress',
        'physical_progress',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];
}
