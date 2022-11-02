<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProjectAllocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_allocation', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('fiscal_year', 15)->default(null)->nullable();
            $table->string('alloc_date', 15)->default(null)->nullable();
            $table->string('alloc_amount', 20)->default(null)->nullable();
            $table->integer('currency_id')->default(0)->nullable();
            $table->string('foreign_alloc_amount', 20)->default(null)->nullable();
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
        Schema::dropIfExists('tbl_project_allocation');
    }
}
