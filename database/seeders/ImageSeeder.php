<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'admin_id'=>1,
                'filename'=>'sample1.jpg',
                'title'=> null

            ],
            [
                'admin_id'=>2,
                'filename'=>'sample2.jpg',
                'title'=> null

            ],
        ]);
    }
}
