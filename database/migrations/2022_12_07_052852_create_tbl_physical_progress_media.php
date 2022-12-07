<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhysicalProgressMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_physical_progress_media', function (Blueprint $table) {
            $table->id();
            $table->integer('physical_progress_id')->default(0)->nullable();
            $table->string('file')->default('')->nullable();
            $table->enum('status', ['Y','N'])->default('Y')->nullable();
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
        Schema::dropIfExists('tbl_project_physical_progress_media');
    }
}
