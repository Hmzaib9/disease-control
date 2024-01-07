<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('test_id')->references('id')->on('predefined_tests');
            $table->foreign('lab_testmetadata_id')->references('id')->on('lab_test_metadata');
            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('lab_testmetadata_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('test_categories');
            $table->bigInteger('cat_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->bigInteger('location_id')->unsigned();
            $table->string('test_value');
            $table->string('parent_id')->nullable()->default(NULL);
            $table->Integer('medical_number');
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
        Schema::dropIfExists('lab_tests');
    }
};
