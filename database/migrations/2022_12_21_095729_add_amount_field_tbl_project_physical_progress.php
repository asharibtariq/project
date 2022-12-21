<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountFieldTblProjectPhysicalProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project_physical_progress', function (Blueprint $table) {
            $table->string('amount')->nullable()->after('physical_description')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_project_physical_progress', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
}
