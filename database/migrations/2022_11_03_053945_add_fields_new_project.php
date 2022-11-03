<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsNewProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project', function (Blueprint $table) {
            $table->string('approval_type',100)->nullable()->after('name')->default(null);
            $table->string('fiscal_year',20)->nullable()->after('approval_type')->default(null);
            $table->integer('executiveagency_id')->nullable()->after('fiscal_year')->default(0);
            $table->string('approval_date',20)->nullable()->after('executiveagency_id')->default(null);
            $table->string('forum',100)->nullable()->after('approval_date')->default(null);
            $table->integer('currency_id')->nullable()->after('forum')->default(0);
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
            $table->dropColumn('approval_type');
            $table->dropColumn('fiscal_year');
            $table->dropColumn('executiveagency_id');
            $table->dropColumn('approval_date');
            $table->dropColumn('forum');
            $table->dropColumn('currency_id');
        });
    }
}
