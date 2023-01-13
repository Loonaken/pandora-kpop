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
                'filename'=> '2123503029_63bbb44a2d12c.jpg',
                'title'=> 'Loona',

            ],
            [
                'admin_id'=>1,
                'filename'=>'1034554667_63be8f1bc7d5d.jpg',
                'title'=> 'Iz*one'

            ],
        ]);
    }
}
