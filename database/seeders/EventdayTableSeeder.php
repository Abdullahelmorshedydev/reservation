<?php

namespace Database\Seeders;

use App\Models\Eventday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventdayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eventdays')->delete();
        Eventday::factory(10)->create();
    }
}
