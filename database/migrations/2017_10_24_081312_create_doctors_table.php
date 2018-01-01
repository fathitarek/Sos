<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('gender'); //1 as male - 2 as female
            $table->text('address'); 
            $table->bigInteger('mobile');
            $table->bigInteger('card_type'); //1 as visa - 2 as master card 
            $table->string('card_name');
            $table->date('number_expiry_date');
            //3.medical_syndicate: 4. Specialty _id 5. date_medical_syndicate 6. license_ministry_health:
            $table->string('medical_syndicate');
            $table->date('date_medical_syndicate_id');
            $table->string('license_ministry_health_id');
            $table->bigInteger('ccv');
            $table->bigInteger('national_id');
            $table->text('image_national_id');
            $table->integer('specialty_id');      
            $table->boolean('active');
            $table->boolean('approved');
            $table->boolean('verify');
            $table->boolean('rejected');
            $table->boolean('pending');
            $table->boolean('approved_terms');
            $table->integer('user_id')->unsigned();
            $table->longText('mobile_identifier');
            //$table->foreign('role_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('doctors');
    }

}
