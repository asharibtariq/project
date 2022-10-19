<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'tbl_report_log';

    protected $fillable = [
        'report_id',
        'project_id',
        'project',
        'data',
        'date',
        'user_id',
        'action'
    ];
}
