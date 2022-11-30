<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblEndOfFy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_end_of_fy', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('fiscal_year', 20)->default(null)->nullable();
            $table->string('date',100)->default(null)->nullable();
            $table->string('local_amount_surrender')->default(null)->nullable();
            $table->integer('currency_id_surrender')->default(0)->nullable();
            $table->string('currency_surrender',100)->default(null)->nullable();
            $table->string('foreign_amount_surrender',100)->default(null)->nullable();
            $table->string('local_amount_lapsed')->default(null)->nullable();
            $table->integer('currency_id_lapsed')->default(0)->nullable();
            $table->string('currency_lapsed',100)->default(null)->nullable();
            $table->string('foreign_amount_lapsed',100)->default(null)->nullable();
            $table->string('financial_progress')->default(null)->nullable();
            $table->string('physical_progress',100)->default(null)->nullable();
            $table->string('remarks')->default(null)->nullable();
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
        Schema::dropIfExists('tbl_end_of_fy');
    }
}
