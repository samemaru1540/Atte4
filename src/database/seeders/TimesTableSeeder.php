<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            [
                'user_id' => 1,
                'date' => '2024-09-19',
                'attend' => '10:00:00',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 2,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 3,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 4,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 5,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 6,
                'date' => '2024-09-19',
                'attend' => '10:00:00',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 7,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 8,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 9,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 10,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 11,
                'date' => '2024-09-19',
                'attend' => '10:00:00',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 12,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 13,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 14,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 15,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 16,
                'date' => '2024-09-19',
                'attend' => '10:00:00',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 17,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 18,
                'date' => '2024-09-19',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 19,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 20,
                'date' => '2024-09-19',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ]
        ]);
    }
}
