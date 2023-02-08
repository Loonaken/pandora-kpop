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
                'filename'=> 'loona pic 4.jpeg',
                'title'=> 'Loona',

            ],
            [
                'filename'=>'izone_pic_1.jpeg',
                'title'=> 'Iz*one'

            ],
            [
                'filename'=>'Twice2_pic.jpeg',
                'title'=> 'Twice'

            ],
            [
                'filename'=>'BTS.jpeg',
                'title'=> 'BTS'

            ],
            [
                'filename'=>'The_Boyz_pic.png',
                'title'=> 'The_Boyz'

            ],
            [
                'filename'=>'fromis_9_pic.jpeg',
                'title'=> 'Fromis_9'

            ],
            [ //7
                'filename'=>'Loonatic.jpeg',
                'title'=> 'loonatic'

            ],
            [ //8
                'filename'=>'so_what.jpeg',
                'title'=> 'So what'

            ],
            [ //9
                'filename'=>'Flip that.jpeg',
                'title'=> 'Flip that'

            ],
            [ //10
                'filename'=>'Violeta.jpeg',
                'title'=> 'Violeta'
            ],
            [ //11
                'filename'=>'Secret Story Of Swan.jpeg',
                'title'=> 'Secret Story of the Swan'
            ],
            [ //12
                'filename'=>'To heart.jpeg',
                'title'=> 'To heart'
            ],
            [ //13
                'filename'=>'Slow journey.jpeg',
                'title'=> 'Slow Journey'
            ],
            [ //14
                'filename'=>'wake me up.jpeg',
                'title'=> 'Wake me up'
            ],
            [ //15
                'filename'=>'TT.jpeg',
                'title'=> 'TT'
            ],
            [ //16
                'filename'=>'Likey.jpeg',
                'title'=> 'Likey'
            ],
            [ //17
                'filename'=>'Love bomb.jpeg',
                'title'=> 'Love bomb'
            ],
            [ //18
                'filename'=>'stay this way.jpeg',
                'title'=> 'Stay this way'
            ],
            [ //19
                'filename'=>'Spring day.jpeg',
                'title'=> 'Spring day'
            ],
            [ //20
                'filename'=>'Boy in Luv.jpeg',
                'title'=> 'Boy in luv'
            ],
            [ //21
                'filename'=>'Butter.png',
                'title'=> 'Butter'
            ],
            [ //22
                'filename'=>'Thrill ride.jpeg',
                'title'=> 'Thrill ride'
            ],
            [ //23
                'filename'=>'whisper.jpeg',
                'title'=> 'Whisper'
            ],
            [ //24
                'filename'=>'No air.jpeg',
                'title'=> 'No air'
            ],
            [ //25
                'filename'=>'Newjeans.jpg',
                'title'=> 'newjeans'
            ],

        ]);
    }
}
