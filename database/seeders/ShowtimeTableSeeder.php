<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowtimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Showtime::create([
            'start_time' => '06:00:00',
            'end_time' => '08:30:00',
            'status' => 1,
        ]);
        Showtime::create([
            'start_time' => '08:30:00',
            'end_time' => '10:00:00',
            'status' => 1,
        ]);
        Showtime::create([
            'start_time' => '10:30:00',
            'end_time' => '01:00:00',
            'status' => 1,
        ]);
    }
}
