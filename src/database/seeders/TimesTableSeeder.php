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
                'date' => '2021-11-01',
                'attend' => '10:00:00',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 2,
                'date' => '2021-11-01',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 3,
                'date' => '2021-11-01',
                'attend' => '10:00:10',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 4,
                'date' => '2021-11-01',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ],
            [
                'user_id' => 5,
                'date' => '2021-11-01',
                'attend' => '10:00:20',
                'leave' => '20:00:00'
            ]
        ]);
    }
}
