<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInspectionDateTblProjectPhysicalProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project_physical_progress', function (Blueprint $table) {
            $table->string('inspect_date', 50)->nullable()->after('date')->default(null);
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
            $table->dropColumn('inspect_date', 50);
        });
    }
}
