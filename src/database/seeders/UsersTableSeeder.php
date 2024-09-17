<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'id' => 2,
            'name' => 'テスト太郎'
            'email' => 'test_taro@icloud.com',
            'password' => 'test_test2'
            ];
            DB::table('users')->insert($user);
        $user = [
            'id' => 3,
            'name' => 'テスト次郎'
            'email' => 'test_taro@icloud.com',
            'password' => 'test_test23'
            ];
            DB::table('users')->insert($user);
        $user = [
            'id' => 4,
            'name' => 'テスト三郎'
            'email' => 'test_taro@icloud.com',
            'password' => 'test_test234'
            ];
            DB::table('users')->insert($user);
        $user = [
            'id' => 5,
            'name' => 'テスト四郎'
            'email' => 'test_taro@icloud.com',
            'password' => 'test_test2345'
            ];
            DB::table('users')->insert($user);
        $user = [
            'id' => 6,
            'name' => 'テスト五郎'
            'email' => 'test_taro@icloud.com',
            'password' => 'test_test23456'
            ];
            DB::table('users')->insert($user);
    }
}
