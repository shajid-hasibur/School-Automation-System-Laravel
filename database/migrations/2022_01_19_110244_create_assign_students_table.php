<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->comment('user_id=student_id');
            $table->string('roll',4)->nullable();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('shift_id');
            $table->unsignedBigInteger('add_subject_id')->nullable();
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
        Schema::dropIfExists('assign_students');
    }
}
