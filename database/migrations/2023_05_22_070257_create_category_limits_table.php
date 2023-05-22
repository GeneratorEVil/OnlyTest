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
        Schema::create('category_limits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_category_id', false, true)->nullable(false);
            $table->bigInteger('user_position_id', false, true)->nullable(false);
            $table->foreign('car_category_id')->references('id')->on('car_categories');
            $table->foreign('user_position_id')->references('id')->on('user_positions');
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
        Schema::dropIfExists('category_limits');
    }
};
