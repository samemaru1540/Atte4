<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = [
            'id' => 1,
            'user_id' => 2,
            'date' => '2021-11-01',
            'attend' => '10:00:00',
            'leave' => '20:00:00'
            ];
            DB::table('times')->insert($time);
            $time = [
            'id' => 2,
            'user_id' => 3,
            'date' => '2021-11-01',
            'attend' => '10:00:10',
            'leave' => '20:00:00'
            ];
            DB::table('times')->insert($time);
            $time = [
            'id' => 3,
            'user_id' => 4,
            'date' => '2021-11-01',
            'attend' => '10:00:10',
            'leave' => '20:00:00'
            ];
            DB::table('times')->insert($time);
            $time = [
            'id' => 4,
            'user_id' => 5,
            'date' => '2021-11-01',
            'attend' => '10:00:20',
            'leave' => '20:00:00'
            ];
            DB::table('times')->insert($time);
            $time = [
            'id' => 4,
            'user_id' => 6,
            'date' => '2021-11-01',
            'attend' => '10:00:20',
            'leave' => '20:00:00'
            ];
            DB::table('times')->insert($time);
    }
}
