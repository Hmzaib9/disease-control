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
        Schema::create('lab_test_metadata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('lab_id')->references('id')->on('institutions');
            $table->bigInteger('lab_id')->unsigned();
            $table->string('patient_name');
            $table->integer('patient_id_number');
            $table->integer('age');
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
        Schema::dropIfExists('lab_test_metadata');
    }
};
