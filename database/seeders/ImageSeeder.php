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
                'filename'=> '',
                'title'=> 'Loona',

            ],
            [
                'admin_id'=>1,
                'filename'=>'',
                'title'=> 'Iz*one'

            ],
        ]);
    }
}
