<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblPhysicalTarget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_physical_target', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('fiscal_year', 20)->default(null)->nullable();
            $table->integer('component_id')->default(0)->nullable();
            $table->string('component',100)->default(null)->nullable();
            $table->string('physical_description', 20)->default(null)->nullable();
            $table->integer('currency_id')->default(0)->nullable();
            $table->string('currency',100)->default(null)->nullable();
            $table->string('amount',100)->default(null)->nullable();
            $table->string('start_date', 100)->default(null)->nullable();
            $table->string('end_date', 100)->default(null)->nullable();
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
        Schema::dropIfExists('tbl_physical_target');
    }
}
