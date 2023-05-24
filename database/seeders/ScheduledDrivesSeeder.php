<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScheduledDrivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('scheduled_drives')->insert(
            [
                [
                    'start_datetime' => '2023-05-24 8:00',
                    'end_datetime' => '2023-05-24 10:00',
                    'car_id' => 1,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 1)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 8:00:00',
                    'updated_at' => '2023-05-24 8:00:00',

                ],
                [
                    'start_datetime' => '2023-05-24 8:10',
                    'end_datetime' => '2023-05-24 9:10',
                    'car_id' => 2,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 5)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 8:10:00',
                    'updated_at' => '2023-05-24 8:10:00',
                ],
                [
                    'start_datetime' => '2023-05-24 8:10',
                    'end_datetime' => '2023-05-24 8:50',
                    'car_id' => 3,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 2)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 8:10:00',
                    'updated_at' => '2023-05-24 8:10:00',
                ],
                [
                    'start_datetime' => '2023-05-24 8:50',
                    'end_datetime' => '2023-05-24 10:00',
                    'car_id' => 3,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 4)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 8:50:00',
                    'updated_at' => '2023-05-24 8:50:00',
                ],
                [
                    'start_datetime' => '2023-05-24 9:10',
                    'end_datetime' => '2023-05-24 10:00',
                    'car_id' => 2,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 2)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 9:10:00',
                    'updated_at' => '2023-05-24 9:10:00',
                ],
                [
                    'start_datetime' => '2023-05-24 12:00',
                    'end_datetime' => '2023-05-24 13:00',
                    'car_id' => 3,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 3)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 12:00:00',
                    'updated_at' => '2023-05-24 12:00:00',
                ],
                [
                    'start_datetime' => '2023-05-24 12:00',
                    'end_datetime' => '2023-05-24 13:30',
                    'car_id' => 1,
                    'user_id' => fake()->randomElement(User::where('user_position_id', 5)->pluck('id')->toArray()),
                    'created_at' => '2023-05-24 12:00:00',
                    'updated_at' => '2023-05-24 12:00:00',
                ]
            ]
        );
    }
}
