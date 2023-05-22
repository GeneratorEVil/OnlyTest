<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryLimitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('category_limits')->insert([
            [
                'car_category_id' => 1,
                'user_position_id' => 1,
            ],
            [
                'car_category_id' => 2,
                'user_position_id' => 1,
            ],
            [
                'car_category_id' => 3,
                'user_position_id' => 1,
            ],
            [
                'car_category_id' => 2,
                'user_position_id' => 2,
            ],
            [
                'car_category_id' => 3,
                'user_position_id' => 2,
            ],
            [
                'car_category_id' => 2,
                'user_position_id' => 3,
            ],
            [
                'car_category_id' => 3,
                'user_position_id' => 3,
            ],
            [
                'car_category_id' => 3,
                'user_position_id' => 4,
            ],
            [
                'car_category_id' => 1,
                'user_position_id' => 5,
            ],
            [
                'car_category_id' => 2,
                'user_position_id' => 5,
            ],
            [
                'car_category_id' => 3,
                'user_position_id' => 5,
            ]
        ]);
    }
}
