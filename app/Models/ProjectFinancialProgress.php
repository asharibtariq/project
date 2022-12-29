<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFinancialProgress extends Model
{
    use HasFactory;
    protected $table = "tbl_project_financial_progress";
    protected $fillable = [
        'id',
        'project_id',
        'project',
        'physical_target_id',
        'fiscal_year',
        'component_id',
        'component',
        'date',
        'inspect_date',
        'physical_description',
        'amount',
        'amount_spent',
        'amount_unpaid',
        'instrument_detail',
        'file',
        'status',
        'created_by',
        'updated_by'
    ];
}
