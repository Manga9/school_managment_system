<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('email')->unique();
            $table->string('password');

            //Father Information

            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_passport_id')->nullable();
            $table->string('father_phone');
            $table->string('father_job');
            $table->bigInteger('father_nationality_id');
            $table->foreign('father_nationality_id')->references('id')->on('nationalities');
            $table->bigInteger('father_blood_type_id');
            $table->foreign('father_blood_type_id')->references('id')->on('bloods');
            $table->bigInteger('father_religion_id');
            $table->foreign('father_religion_id')->references('id')->on('religons');
            $table->string('father_address');

            //Mother Information

            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->string('mother_passport_id')->nullable();
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->bigInteger('mother_nationality_id');
            $table->foreign('mother_nationality_id')->references('id')->on('nationalities');
            $table->bigInteger('mother_blood_type_id');
            $table->foreign('mother_blood_type_id')->references('id')->on('bloods');
            $table->bigInteger('mother_religion_id');
            $table->foreign('mother_religion_id')->references('id')->on('religons');
            $table->string('mother_address');

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
        Schema::dropIfExists('my_parents');
    }
}
