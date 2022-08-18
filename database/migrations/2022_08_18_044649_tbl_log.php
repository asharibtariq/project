<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_report_log', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id')->default(0)->nullable();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('project')->default(null)->nullable();
            $table->text('data')->default(null)->nullable();
            $table->integer('user_id')->default(0)->nullable();
            $table->string('action')->default(null)->nullable();
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
        Schema::dropIfExists('tbl_report_log');
            //
    }
}
