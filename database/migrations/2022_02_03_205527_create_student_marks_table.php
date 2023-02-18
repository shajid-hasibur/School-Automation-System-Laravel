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
            $table->integer('student_id')->comment('student_id=user_id');
            $table->string('id_no')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('exam_type_id')->nullable();
            $table->integer('assign_subject_id')->nullable();
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