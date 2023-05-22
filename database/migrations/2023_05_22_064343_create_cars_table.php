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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model')->nullable(false);
            $table->bigInteger('driver_id', false, true)->nullable(false)->unique('car_driver');
            $table->bigInteger('car_category_id', false, true)->nullable(false);
            $table->foreign('car_category_id')->references('id')->on('car_categories');
            $table->foreign('driver_id')->references('id')->on('drivers');
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
        Schema::table(
            'cars',
            fn (Blueprint $table) => $table->dropForeign('cars_driver_id_foreign')
        );
        Schema::dropIfExists('cars');
    }
};
