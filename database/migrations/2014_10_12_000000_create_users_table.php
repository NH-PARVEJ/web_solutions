<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('repeat_password')->nullable();
            $table->text('image')->nullable();
            $table->text('qr_code_image')->nullable();
            $table->string('address')->nullable();
            $table->string('employee_attendance_code')->nullable();
            $table->integer('designation')->default(1)->comment('1=Jr-Developer 2=Sr-Developer 3=Project-Manager')->nullable();
            $table->integer('department')->default(1)->comment('1=Web-Development  2=Digital-Marketing')->nullable();
            $table->integer('gender')->default(1)->comment('1= Male 2=Female');
            $table->integer('role')->default(3)->comment('1=SuperAdmin 2=Employee 3=Intern');
            $table->integer('status')->default(1)->comment('1=Active 2=Inactive');
            $table->rememberToken();
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
};
