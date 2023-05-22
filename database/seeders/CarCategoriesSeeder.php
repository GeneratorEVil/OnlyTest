<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('car_categories')->insert([
            [
                'category' => 'Первая категория',                
            ],
            [
                'category' => 'Вторая категория',
            ],
            [
                'category' => 'Третья категория',
            ]
        ]);

        
    }
}
