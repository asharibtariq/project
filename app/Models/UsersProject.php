<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProject extends Model{
    use HasFactory;
    protected $table = "tbl_users_project";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'project_id',
        'project'
    ];

}
