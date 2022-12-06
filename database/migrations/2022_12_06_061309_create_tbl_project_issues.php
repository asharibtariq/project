<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProjectIssues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_issues', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('project')->default('')->nullable();
            $table->integer('component_id')->default(0)->nullable();
            $table->string('component')->default('')->nullable();
            $table->string('date',50)->default('')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['issue','suggest'])->default('suggest');
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
        Schema::dropIfExists('tbl_project_issues');
    }
}
