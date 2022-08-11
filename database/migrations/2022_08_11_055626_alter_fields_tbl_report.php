<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFieldsTblReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_report', function (Blueprint $table) {
            $table->string('fiscal_year', 4)->default(null)->nullable()->after('id');
            $table->dropColumn('serial');
            $table->dropColumn('total_cost');
            $table->dropColumn('alloc_year');
            $table->dropColumn('release_year');
            $table->dropColumn('util_year');
            $table->dropColumn('comp_date_pc1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_report', function (Blueprint $table) {
            $table->dropColumn('fiscal_year');
            $table->string('serial',50)->default(null)->nullable()->after('id');
            $table->integer('total_cost')->default(0)->after('project');
            $table->string('alloc_year')->default(null)->nullable()->after('alloc_revised');
            $table->string('release_year')->default(null)->nullable()->after('release_total_actual');
            $table->string('util_year')->default(null)->nullable()->after('util_total');
            $table->string('comp_date_pc1')->default(null)->nullable()->after('physical_prog');
        });
    }
}
