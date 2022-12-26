<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProjectActionItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_action_items', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('project')->default('')->nullable();
            $table->integer('physical_target_id')->default(0)->nullable();
            $table->string('date')->default('')->nullable();
            $table->integer('component_id')->default(0)->nullable();
            $table->string('component')->default('')->nullable();
            $table->string('action_item')->default('')->nullable();
            $table->string('assigned_to')->default('')->nullable();
            $table->string('start_date')->default('')->nullable();
            $table->string('end_date')->default('')->nullable();
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
        Schema::dropIfExists('tbl_project_action_items');
    }
}
