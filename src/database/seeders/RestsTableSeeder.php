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
            ],
            [
                'time_id' => 6,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 7,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 8,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 9,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 10,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 11,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 12,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 13,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 14,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 15,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 16,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 17,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 18,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 19,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ],
            [
                'time_id' => 20,
                'break' => '01:00:00',
                'break_end' => '01:30:00'
            ]
        ]);
    }
}
