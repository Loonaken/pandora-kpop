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
                'name'=>'test1',
                'email'=>'test1@test.com',
                'password'=>Hash::make('password1123'),
                'created_at'=>'2022/12/28 12:18:11'
            ],
            [
                'name'=>'test2',
                'email'=>'test2@test.com',
                'password'=>Hash::make('password1223'),
                'created_at'=>'2022/12/30 12:18:11'
            ],
        ]);
    }
}
