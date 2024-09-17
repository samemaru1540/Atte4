<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'テスト太郎',
                'email' => 'testtorou@icloud.com',
                'password' =>'tesuto.taro1'
            ],
            [
                'name' => 'テスト次郎',
                'email' => 'testjiro2@icloud.com',
                'password' => 'tesuto.jiro2'
            ],
            [
                'name' => 'テスト三郎',
                'email' => 'testsaburo3@icloud.com',
                'password' => 'tesuto.saburo3'
            ],
            [
                'name' => 'テスト四郎',
                'email' => 'testsiro4@icloud.com',
                'password' => 'tesuto.siro4'
            ],
            [
                'name' => 'テスト五郎',
                'email' => 'testgoro5@icloud.com',
                'password' => 'tesuto.goro5'
            ]
        ]);
    }
}
