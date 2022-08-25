<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsTotalAllocDescTblReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_report', function (Blueprint $table) {
            $table->float('alloc_total')->nullable()->after('alloc_revised')->default(null);
            $table->text('physical_prog_desc')->nullable()->after('physical_prog')->default(null);
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
            $table->dropColumn('alloc_total');
            $table->dropColumn('physical_prog_desc');
        });
    }
}
