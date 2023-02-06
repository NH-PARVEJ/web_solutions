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
            $table->timestamp('time')->useCurrent();
            $table->string('attendance_status');
            $table->integer('user_id');
            $table->string('ip_address')->nullable();
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
