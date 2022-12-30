<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTblPhysicalTargetStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_physical_target_status');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('tbl_physical_target_status', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('project')->default('')->nullable();
            $table->integer('physical_target_id')->default(0)->nullable();
            $table->string('date')->default('')->nullable();
            $table->enum('pace', ['slow','on_track','fast'])->default('on_track')->nullable();
            $table->enum('status', ['in_process','complete','halted'])->default('in_process')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
