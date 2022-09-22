<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblUsersProject extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tbl_users_project', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('project')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('tbl_users_project');
    }
}
