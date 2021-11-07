<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('from_grade_id');
            $table->foreign('from_grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('from_classroom_id');
            $table->foreign('from_classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('from_section_id');
            $table->foreign('from_section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('to_grade_id');
            $table->foreign('to_grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('to_classroom_id');
            $table->foreign('to_classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('to_section_id');
            $table->foreign('to_section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->string('old_academic');
            $table->string('new_academic');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
