<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsTblProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project', function (Blueprint $table) {
            $table->float('local_fund')->nullable()->after('name')->default(null);
            $table->float('foreign_fund')->nullable()->after('local_fund')->default(null);
            $table->float('start_date')->nullable()->after('cost')->default(null);
            $table->float('end_date')->nullable()->after('start_date')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_project', function (Blueprint $table) {
            $table->dropColumn('local_fund');
            $table->dropColumn('foreign_fund');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
