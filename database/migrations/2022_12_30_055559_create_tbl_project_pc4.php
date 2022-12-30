<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProjectPc4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_pc4', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('project_name')->default(null)->nullable();
            $table->string('fiscal_year', 20)->default(null)->nullable();
            $table->string('preparation_status',100)->default(null)->nullable();
            $table->string('preparation_remarks')->default(null)->nullable();
            $table->string('ministry_status',100)->default(null)->nullable();
            $table->string('ministry_remarks')->default(null)->nullable();
            $table->string('planning_status',100)->default(null)->nullable();
            $table->string('planning_remarks')->default(null)->nullable();
            $table->string('finance_status',100)->default(null)->nullable();
            $table->string('finance_remarks')->default(null)->nullable();
            $table->string('budget_status',100)->default(null)->nullable();
            $table->string('budget_remarks')->default(null)->nullable();
            $table->enum('status', ['Y','N'])->default('Y');
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
        Schema::dropIfExists('tbl_project_pc4');
    }
}
