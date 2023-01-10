<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emotions')->insert([
            [
                'name'=> 'FUN',
                'sort_order'=> '1'
            ],
            [
                'name'=> 'MYSTIC',
                'sort_order'=> '2'
            ],
            [
                'name'=> 'HIGH-TEMPO',
                'sort_order'=> '1'
            ],
            [
                'name'=> 'HEALING',
                'sort_order'=> '3'
            ],
            [
                'name'=> 'RAP',
                'sort_order'=> '1'
            ],
        ]);
    }
}
