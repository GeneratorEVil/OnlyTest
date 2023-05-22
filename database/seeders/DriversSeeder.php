<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \DB::table('drivers')->insert([
            [
                'name' => 'Иванов Иван Иванович',
            ],
            [
                'name' => 'Петров Петр Петрович',
            ],
            [
                'name' => 'Сидоров Сидор Сидорович',
            ]
        ]);
    }
}
