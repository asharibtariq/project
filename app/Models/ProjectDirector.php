<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDirector extends Model
{
    use HasFactory;

    protected $table = "tbl_project_director";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'name',
        'address',
        'email',
        'designation_id',
        'designation',
        'phone_no',
        'wef_date',
        'organization_id',
        'organization',
        'cell_number',
        'status',
        'created_by',
        'updated_by'
    ];
}
