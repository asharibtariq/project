<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_report', function (Blueprint $table) {
            $table->id();
            $table->string('serial',50)->default(null)->nullable();
            $table->integer('project_id')->default(0);
            $table->string('project')->default(null)->nullable();
            $table->integer('total_cost')->default(0);
            $table->integer('actual_expend')->default(0);
            $table->string('expend_year')->default(null)->nullable();
            $table->integer('alloc_rupee')->default(0);
            $table->integer('alloc_foreign')->default(0);
            $table->integer('alloc_revised')->default(0);
            $table->string('alloc_year')->default(null)->nullable();
            $table->integer('release_fund_auth')->default(0);
            $table->integer('release_fund_actual')->default(0);
            $table->integer('release_foreign')->default(0);
            $table->integer('release_total_actual')->default(0);
            $table->string('release_year')->default(null)->nullable();
            $table->integer('util_actual')->default(0);
            $table->integer('util_foreign')->default(0);
            $table->integer('util_total')->default(0);
            $table->string('util_year')->default(null)->nullable();
            $table->integer('amt_surrender')->default(0);
            $table->integer('amt_lapsed')->default(0);
            $table->integer('financial_prog')->default(0);
            $table->integer('physical_prog')->default(0);
            $table->string('comp_date_pc1')->default(null)->nullable();
            $table->string('comp_date_likely')->default(null)->nullable();
            $table->string('remarks')->default(null)->nullable();
            $table->string('note')->default(null)->nullable();
            $table->enum('status', ['Y','N'])->default('Y');
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
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
        Schema::dropIfExists('tbl_report');
    }
}
