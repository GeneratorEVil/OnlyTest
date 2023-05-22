<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {       
        $this->call(CarCategoriesSeeder::class);
        $this->call(UserPositionsSeeder::class);
        $this->call(DriversSeeder::class);        
        User::factory(10)->create();
        Car::factory(3)->create();
        $this->call(CategoryLimitsSeeder::class);

    }
}
