<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhysicalTargetFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_physical_target', function (Blueprint $table) {
            $table->enum('target_status', ['complete','ongoing','not_achieve'])->after('end_date')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_physical_target', function (Blueprint $table) {
            $table->dropColumn('target_status');
        });
    }
}
