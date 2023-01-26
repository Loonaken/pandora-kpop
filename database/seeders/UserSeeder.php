<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'test',
                'email'=>'test@test.com',
                'password'=>Hash::make('password123'),
                'created_at'=>'2022/12/28 12:18:11'
            ],
            [
                'name'=>'btsFan',
                'email'=>'btsFan@gmail.com',
                'password'=>Hash::make('password123'),
                'created_at'=>'2022/1/4 12:18:11'
            ],
            [
                'name'=>'TwiceTaro',
                'email'=>'taro@gmail.com',
                'password'=>Hash::make('password123'),
                'created_at'=>'2022/1/10 12:18:11'
            ],
        ]);
    }
}
