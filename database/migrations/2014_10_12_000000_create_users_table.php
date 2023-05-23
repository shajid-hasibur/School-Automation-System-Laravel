<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usertype',15)->nullable()->comment('Student, Teacher, Employee, Admin');
            $table->string('name',100)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile',15)->nullable();
            $table->string('address')->nullable();
            $table->string('gender',10)->nullable();
            $table->string('image')->nullable();
            $table->string('fname',100)->nullable();
            $table->string('mname',100)->nullable();
            $table->string('religion',10)->nullable();
            $table->string('id_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('code',15)->nullable();
            $table->string('role',15)->nullable()->comment('admin=headofsoft, operator, user=employee');
            $table->date('joindate')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
