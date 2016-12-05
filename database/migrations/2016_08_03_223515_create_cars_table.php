<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->string('brand_model');
            $table->string('state_number');
            $table->integer('fabrication_year');
            $table->enum('oil_type', ['DIESEL', 'GASOLINE', 'GAS']);
            $table->enum('gps', ['AVAILABLE', 'UNAVAILABLE']);
            $table->string('image');
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('cars');
    }
}
