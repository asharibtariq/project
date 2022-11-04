<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsProjectdirector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project_director', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0)->nullable();
            $table->string('name', 100)->default(null)->nullable();
            $table->string('address')->default(null)->nullable();
            $table->string('email', 100)->default(null)->nullable();
            $table->integer('designation_id')->default(0)->nullable();
            $table->string('designation',100)->default(null)->nullable();
            $table->string('phone_no', 20)->default(null)->nullable();
            $table->string('wef_date',30)->default(null)->nullable();
            $table->integer('organization_id')->default(0)->nullable();
            $table->string('organization',100)->default(null)->nullable();
            $table->string('cell_number',20)->default(null)->nullable();
            $table->enum('status', ['Y','N'])->default('Y');
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_project_director');
    }
}
