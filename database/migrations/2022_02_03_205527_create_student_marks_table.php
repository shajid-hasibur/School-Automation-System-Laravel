<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->comment('student_id=user_id');
            $table->string('id_no')->nullable();
            $table->unsignedBigInteger('year_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->unsignedBigInteger('exam_type_id')->nullable();
            $table->unsignedBigInteger('assign_subject_id')->nullable();
            $table->unsignedBigInteger('add_subject_id')->nullable();
            $table->double('marks')->nullable();
            $table->double('descriptive_mark')->nullable();
            $table->double('objective_mark')->nullable();
            $table->double('practical_mark')->nullable();
            $table->double('total_mark')->nullable();
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
        Schema::dropIfExists('student_marks');
    }
}
