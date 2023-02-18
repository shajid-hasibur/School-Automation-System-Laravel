<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessons extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id', 'teacher_fk_1001')->references('id')->on('users');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id', 'class_fk_1002')->references('id')->on('student_classes');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id', 'subject_fk_1003')->references('id')->on('student_classes');
        });
    }
}
