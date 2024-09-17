<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rests')->insert([
            [
                'time_id' => 1,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 2,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 3,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 4,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 5,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ]
        ]);
    }
}
