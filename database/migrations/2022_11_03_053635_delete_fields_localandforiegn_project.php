<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFieldsLocalandforiegnProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project', function (Blueprint $table) {
            $table->dropColumn('local_fund');
            $table->dropColumn('foreign_fund');
            $table->dropColumn('complete_date');
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
            $table->float('local_fund')->nullable()->after('cost')->default(null);
            $table->float('foreign_fund')->nullable()->after('start_date')->default(null);
            $table->string('complete_date')->nullable()->after('end_date')->default(null);
        });
    }
}
