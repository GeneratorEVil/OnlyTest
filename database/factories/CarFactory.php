<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\CarCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $carCategoryId = 1;
    public $carModels = ['BMW 535', 'Hyundai Sonata', 'Lada Vesta'];
    public function definition()
    {

        return [
            //
            'model' => $this->carModels[$this->carCategoryId - 1],
            'driver_id' => $this->faker->unique()->randomElement(Driver::all()->pluck('id')->toArray()),
            'car_category_id' => $this->carCategoryId++
        ];
    }
}
