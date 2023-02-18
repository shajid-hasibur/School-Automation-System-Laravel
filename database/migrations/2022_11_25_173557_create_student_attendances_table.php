<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('student_id = User id');
            $table->integer('roll')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->date('date');
            $table->string('attendance_status')->comment('attendance_status = Present, Absent, Leave, Half Day');
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
        Schema::dropIfExists('student_attendances');
    }
}
