<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyFieldTblProjectAllocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project_allocation', function (Blueprint $table) {
            $table->string('currency')->nullable()->after('currency_id')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_project_allocation', function (Blueprint $table) {
            $table->dropColumn('currency');
        });
    }
}
