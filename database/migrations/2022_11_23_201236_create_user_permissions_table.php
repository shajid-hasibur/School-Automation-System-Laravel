<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->string('dashboard')->nullable()->comment("1=active, 0=Inactive");
            $table->string('manage_profile')->nullable()->comment("1=active, 0=Inactive");
            $table->string('setup_management')->nullable()->comment("1=active, 0=Inactive");
            $table->string('student_management')->nullable()->comment("1=active, 0=Inactive");
            $table->string('employee_management')->nullable()->comment("1=active, 0=Inactive");
            $table->string('mark_management')->nullable()->comment("1=active, 0=Inactive");
            $table->string('account_management')->nullable()->comment("1=active, 0=Inactive");
            $table->string('result')->nullable()->comment("1=active, 0=Inactive");
            $table->string('report')->nullable()->comment("1=active, 0=Inactive");

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
        Schema::dropIfExists('user_permissions');
    }
}
