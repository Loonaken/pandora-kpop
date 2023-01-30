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
                'filename'=>'20952995_63d5cb2c3648d.jpg',
                'title'=> 'Iz*one'

            ],
            [
                'admin_id'=>1,
                'filename'=>'292293327_63c26b98dd0b6.jpg',
                'title'=> 'Twice'

            ],
            [
                'admin_id'=>1,
                'filename'=>'1015608228_63c26b503e727.jpg',
                'title'=> 'BTS'

            ],
            [
                'admin_id'=>1,
                'filename'=>'1093696959_63c26b3f02390.png',
                'title'=> 'The_Boyz'

            ],
            [
                'admin_id'=>1,
                'filename'=>'68081296_63c3dbbe157a6.jpg',
                'title'=> 'Fromis_9'

            ],
        ]);
    }
}
