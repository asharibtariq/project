<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsTblProjectPhysicalTargets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_physical_target', function (Blueprint $table) {
            $table->string('consumed_budget')->nullable()->after('target_status')->default(null);
            $table->string('act_start_date')->nullable()->after('consumed_budget')->default(null);
            $table->string('act_end_date')->nullable()->after('act_start_date')->default(null);
            $table->string('reason')->nullable()->after('act_end_date')->default(null);
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
            $table->dropColumn('consumed_budget');
            $table->dropColumn('act_start_date');
            $table->dropColumn('act_end_date');
            $table->dropColumn('reason');
        });
    }
}
