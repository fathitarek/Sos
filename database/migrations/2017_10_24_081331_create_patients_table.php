<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('gender'); //1 as male - 2 as female
            $table->text('address');
            $table->bigInteger('mobile');
            $table->integer('card_type'); //1 as visa - 2 as master card
            $table->string('card_name');
            $table->date('number_expiry_date');
            //$table->string('medical_syndicate');
            $table->bigInteger('national_id');
            //$table->text('image_national_id');
            $table->boolean('active');
            $table->text('personal_image');
           // $table->text('front_medical_syndicate_card');
           // $table->text('back_medical_syndicate_card');
            $table->integer('user_id');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('insurance_companies');

            $table->boolean('approved_terms');
            $table->rememberToken();
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
        Schema::drop('patients');
    }
}
