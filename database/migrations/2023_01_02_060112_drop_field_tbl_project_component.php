<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropFieldTblProjectComponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project_component', function (Blueprint $table) {
        //    $table->dropColumn('foreign_amount');
            $table->dropColumn('foreign_amount_d');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_project_component', function (Blueprint $table) {
        //    $table->string('foreign_amount', 20)->after('currency')->default(null)->nullable();
            $table->string('foreign_amount_d', 20)->default(null)->nullable();
        });
    }
}
