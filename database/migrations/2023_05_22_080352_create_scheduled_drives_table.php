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
        Schema::create('scheduled_drives', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_datetime')->nullable(false);
            $table->dateTime('end_datetime')->nullable(false);
            $table->bigInteger('user_id', false, true)->nullable(false);
            $table->bigInteger('car_id', false, true)->nullable(false);            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_drives');
    }
};
