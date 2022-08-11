<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model{

    use HasFactory;
    protected $table = "tbl_report";
    protected $fillable = [
        'serial',
        'project_id',
        'project',
        'total_cost',
        'actual_expend',
        'expend_year',
        'alloc_rupee',
        'alloc_foreign',
        'alloc_revised',
        'alloc_year',
        'release_fund_auth',
        'release_fund_actual',
        'release_foreign',
        'release_total_actual',
        'release_year',
        'util_actual',
        'util_foreign',
        'util_total',
        'util_year',
        'amt_surrender',
        'amt_lapsed',
        'financial_prog',
        'physical_prog',
        'comp_date_pc1',
        'comp_date_likely',
        'remarks',
        'note',
        'status',
        'created_by',
        'updated_by'
    ];
}
