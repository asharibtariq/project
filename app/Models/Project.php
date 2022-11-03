<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'tbl_project';

    protected $fillable = [
        'psdp',
        'psid',
        'name',
        'approval_type',
        'fiscal_year',
        'executiveagency_id',
        'approval_date',
        'forum',
        'cost',
        'currency_id',
        'start_date',
        'end_date',
        'status',
        'created_by',
        'updated_by'
    ];
}