<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatelocationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('city_id');
            $table->integer('region_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('region_id')->references('id')->on('regions');
            //$table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
    }
}
