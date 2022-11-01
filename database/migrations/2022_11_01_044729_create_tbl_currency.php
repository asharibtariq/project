<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_currency', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(null)->nullable();
            $table->string('state')->default(null)->nullable();
            $table->string('symbol')->default(null)->nullable();
            $table->string('iso_code')->default(null)->nullable();
            $table->string('frac_unit')->default(null)->nullable();
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
        Schema::dropIfExists('tbl_currency');
    }
}
