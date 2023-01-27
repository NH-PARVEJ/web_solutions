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
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('user_id')->nullable();
            $table->string('employee_attendance_code')->nullable(); 
            $table->string('ip_address')->nullable();
            $table->date('time_in')->useCurrent(); 
            $table->date('time_out')->useCurrent(); 
            $table->string('status')->default(1)->comment('1=Active 2=Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrati  ons.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
