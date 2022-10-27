<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutiveAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_executive_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(null)->nullable();
            $table->enum('status', ['Y','N'])->default('Y');
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
        Schema::dropIfExists('tbl_executive_agencies');
    }
}
