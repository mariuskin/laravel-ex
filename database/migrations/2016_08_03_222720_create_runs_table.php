<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->integer('year');
            $table->double('first_quarter');
            $table->double('second_quarter');
            $table->double('third_quarter');
            $table->double('fourth_quarter');
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
        Schema::drop('runs');
    }
}
