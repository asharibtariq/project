<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblFyUtil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fy_util', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('fiscal_year', 20)->default(null)->nullable();
            $table->string('quarter')->default(null)->nullable();
            $table->string('fy_date', 100)->default(null)->nullable();
            $table->integer('component_id')->default(0)->nullable();
            $table->string('component',100)->default(null)->nullable();
            $table->string('fy_amount', 20)->default(null)->nullable();
            $table->integer('currency_id')->default(0)->nullable();
            $table->string('currency',100)->default(null)->nullable();
            $table->string('foreign_fy_amount', 20)->default(null)->nullable();
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
        Schema::dropIfExists('tbl_fy_util');
    }
}
