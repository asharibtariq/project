<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsTblReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_report', function (Blueprint $table) {
            $table->string('date',100)->nullable()->after('project')->default(null);
            $table->float('alloc_total',100)->nullable()->after('alloc_revised')->default(null);
            $table->float('physical_prog_desc',100)->nullable()->after('physical_prog')->default(null);
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
            $table->dropColumn('date');
            $table->dropColumn('alloc_total');
            $table->dropColumn('physical_prog_desc');
        });
    }
}
