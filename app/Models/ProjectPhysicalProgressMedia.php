<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPhysicalProgressMedia extends Model
{
    use HasFactory;
    protected $table = "tbl_project_physical_progress_media";
    protected $fillable = [
        'id',
        'physical_progress_id',
        'file',
        'status'
    ];
}
