<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechnicalInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_inspections', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->date('recent_check');
            $table->string('dates');
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
        Schema::drop('technical_inspections');
    }
}
