<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProjectPhysicalProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_physical_progress', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('project')->default('')->nullable();
            $table->integer('physical_target_id')->default(0)->nullable();
            $table->string('fiscal_year', 20)->default(null)->nullable();
            $table->string('date')->default('')->nullable();
            $table->text('progress_detail')->nullable();
            $table->integer('component_id')->default(0)->nullable();
            $table->string('component',100)->default(null)->nullable();
            $table->text('physical_description')->nullable();
            $table->enum('status', ['Y','N'])->default('Y')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_project_physical_progress');
    }
}
