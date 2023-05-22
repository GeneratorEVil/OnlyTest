<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('user_positions')->insert([
            [
                'name' => 'Директор',
            ],
            [
                'name' => 'Системный администратор',
            ],
            [
                'name' => 'Программист',
            ],
            [
                'name' => 'Менеджер по продажам',
            ],
            [
                'name' => 'Начальник отдела IT',
            ],            

        ]);
    }
}
