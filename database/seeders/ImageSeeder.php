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
                'filename'=> '2123503029_63bbb44a2d12c.jpg',
                'title'=> 'Loona',

            ],
            [
                'filename'=>'20952995_63d5cb2c3648d.jpg',
                'title'=> 'Iz*one'

            ],
            [
                'filename'=>'292293327_63c26b98dd0b6.jpg',
                'title'=> 'Twice'

            ],
            [
                'filename'=>'1015608228_63c26b503e727.jpg',
                'title'=> 'BTS'

            ],
            [
                'filename'=>'1093696959_63c26b3f02390.png',
                'title'=> 'The_Boyz'

            ],
            [
                'filename'=>'68081296_63c3dbbe157a6.jpg',
                'title'=> 'Fromis_9'

            ],
            [ //7
                'filename'=>'1253888499_63ddc61414f4d.jpg',
                'title'=> 'loonatic'

            ],
            [ //8
                'filename'=>'249333459_63ddc71e01f86.jpg',
                'title'=> 'So what'

            ],
            [ //9
                'filename'=>'1650257575_63ddc73570c6f.jpg',
                'title'=> 'Flip that'

            ],
            [ //10
                'filename'=>'298158268_63ddc79114290.jpg',
                'title'=> 'Violeta'
            ],
            [ //11
                'filename'=>'76312119_63ddc7903a6ae.jpg',
                'title'=> 'Secret Story of the Swan'
            ],
            [ //12
                'filename'=>'1500323580_63ddf2a27edbd.jpg',
                'title'=> 'To heart'
            ],
            [ //13
                'filename'=>'1345783078_63ddc790ab734.jpg',
                'title'=> 'Slow Journey'
            ],
            [ //14
                'filename'=>'1910741904_63ddc7cb59828.jpg',
                'title'=> 'Wake me up'
            ],
            [ //15
                'filename'=>'452920725_63ddc7cb1e34a.jpg',
                'title'=> 'TT'
            ],
            [ //16
                'filename'=>'330344500_63ddc7cad54d2.jpg',
                'title'=> 'Likey'
            ],
            [ //17
                'filename'=>'1311839266_63ddc7b0e05c8.jpg',
                'title'=> 'Love bomb'
            ],
            [ //18
                'filename'=>'1961975181_63ddc7b15fac0.jpg',
                'title'=> 'Stay this way'
            ],
            [ //19
                'filename'=>'129784215_63ddc7e350d8d.jpg',
                'title'=> 'Spring day'
            ],
            [ //20
                'filename'=>'934864486_63ddc7e1a9c6e.jpg',
                'title'=> 'Boy in luv'
            ],
            [ //21
                'filename'=>'1413760061_63ddc7e1db70f.png',
                'title'=> 'Butter'
            ],
            [ //22
                'filename'=>'190323345_63ddc7fb3f491.jpg',
                'title'=> 'Thrill ride'
            ],
            [ //23
                'filename'=>'529643916_63ddc7fb7df99.jpg',
                'title'=> 'Whisper'
            ],
            [ //24
                'filename'=>'619692633_63ddc7fb07bb7.jpg',
                'title'=> 'No air'
            ],
        ]);
    }
}
