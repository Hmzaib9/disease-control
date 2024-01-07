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
        Schema::create('normal_ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('predefined_test_id')->references('id')->on('predefined_tests');
            $table->bigInteger('predefined_test_id')->unsigned();
            $table->integer('age');
            $table->enum('normal_range_type', ['numeric', 'categorical', 'single_number']);
            $table->decimal('normal_range_lower')->nullable();
            $table->decimal('normal_range_upper')->nullable();
            $table->string('normal_range_string')->nullable();
            $table->decimal('normal_range_single_number')->nullable();
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
        Schema::dropIfExists('normal_ranges');
    }
};
