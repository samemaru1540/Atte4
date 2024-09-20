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
                'email' => 'testtarou@icloud.com',
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
            ],
            [
                'name' => 'テスト六郎',
                'email' => 'testrokuro6@icloud.com',
                'password' =>'tesuto.rokuro6'
            ],
            [
                'name' => 'テスト七郎',
                'email' => 'testsitiro7@icloud.com',
                'password' => 'tesuto.sitiro7'
            ],
            [
                'name' => 'テスト八郎',
                'email' => 'testhatiro8@icloud.com',
                'password' => 'tesuto.hatiro8'
            ],
            [
                'name' => 'テスト九郎',
                'email' => 'testkuro9@icloud.com',
                'password' => 'tesuto.kuro9'
            ],
            [
                'name' => 'テスト十郎',
                'email' => 'testjuro@icloud.com',
                'password' => 'tesuto.juro10'
            ],
            [
                'name' => 'テスト十一郎',
                'email' => 'testjutouitiro11@icloud.com',
                'password' =>'tesuto.touitiro111'
            ],
            [
                'name' => 'テスト十二郎',
                'email' => 'testjujiro2@icloud.com',
                'password' => 'tesuto.jujiro12'
            ],
            [
                'name' => 'テスト十三郎',
                'email' => 'testjusaburo3@icloud.com',
                'password' => 'tesuto.jusaburo13'
            ],
            [
                'name' => 'テスト十四郎',
                'email' => 'testtosiro4@icloud.com',
                'password' => 'tesuto.tosiro14'
            ],
            [
                'name' => 'テスト十五郎',
                'email' => 'testjugoro5@icloud.com',
                'password' => 'tesuto.jugoro15'
            ],
            [
                'name' => 'テスト十六郎',
                'email' => 'testjurokuro6@icloud.com',
                'password' =>'tesuto.jurokuro16'
            ],
            [
                'name' => 'テスト十七郎',
                'email' => 'testjusitiro7@icloud.com',
                'password' => 'tesuto.tositiro17'
            ],
            [
                'name' => 'テスト十八郎',
                'email' => 'testjuhatiro8@icloud.com',
                'password' => 'tesuto.juhatiro18'
            ],
            [
                'name' => 'テスト十九郎',
                'email' => 'testjukuro9@icloud.com',
                'password' => 'tesuto.jukuro19'
            ],
            [
                'name' => 'テスト二十郎',
                'email' => 'testnijuro@icloud.com',
                'password' => 'tesuto.nijuro20'
            ],
        ]);
    }
}
