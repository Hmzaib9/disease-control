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
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('active')->default(0);
            $table->string('address');
            $table->text('map_link');
            $table->string('email');
            $table->string('password');
            $table->string('contact_number');
            $table->string('head_doctor_name');
            $table->string('head_doctor_phone');
            $table->string('technical_officer_name');
            $table->string('technical_officer_phone');
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
        Schema::dropIfExists('institutions');
    }
};
