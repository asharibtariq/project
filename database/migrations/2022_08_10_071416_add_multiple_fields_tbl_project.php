<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleFieldsTblProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project', function (Blueprint $table) {
            $table->string('psdp')->nullable()->default(null)->after('id');
            $table->string('psid')->nullable()->default(null)->after('psdp');
            $table->string('complete_date')->nullable()->default(null)->after('cost');
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
            $table->dropColumn('psdp');
            $table->dropColumn('psid');
            $table->dropColumn('complete_date');
        });
    }
}
