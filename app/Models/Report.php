<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model{

    use HasFactory;
    protected $table = "tbl_report";
    protected $fillable = [
        'fiscal_year',
        'project_id',
        'project',
        'actual_expend',
        'expend_year',
        'alloc_rupee',
        'alloc_foreign',
        'alloc_revised',
        'release_fund_auth',
        'release_fund_actual',
        'release_foreign',
        'release_total_actual',
        'util_actual',
        'util_foreign',
        'util_total',
        'amt_surrender',
        'amt_lapsed',
        'financial_prog',
        'physical_prog',
        'comp_date_likely',
        'remarks',
        'note',
        'status',
        'created_by',
        'updated_by'
    ];
}
