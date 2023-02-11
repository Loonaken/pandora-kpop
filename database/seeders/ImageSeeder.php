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
        //ここは自動で取得する



        DB::table('images')->insert([
            [
                'path'=> 'storage/songs/loona pic 4.jpeg',
                'title'=> 'Loona',
            ],
            [
                'path'=>'storage/songs/izone_pic_1.jpeg',
                'title'=> 'Iz*one'
            ],
            [
                'path'=>'storage/songs/Twice2_pic.jpeg',
                'title'=> 'Twice'
            ],
            [
                'path'=>'storage/songs/BTS.jpeg',
                'title'=> 'BTS'
            ],
            [
                'path'=>'storage/songs/The_Boyz_pic.png',
                'title'=> 'The_Boyz'
            ],
            [
                'path'=>'storage/songs/fromis_9_pic.jpeg',
                'title'=> 'Fromis_9'
            ],
            [ //7
                'path'=>'storage/songs/Loonatic.jpeg',
                'title'=> 'loonatic'
            ],
            [ //8
                'path'=>'storage/songs/so_what.jpeg',
                'title'=> 'So what'
            ],
            [ //9
                'path'=>'storage/songs/Flip that.jpeg',
                'title'=> 'Flip that'
            ],
            [ //10
                'path'=>'storage/songs/Violeta.jpeg',
                'title'=> 'Violeta'
            ],
            [ //11
                'path'=>'storage/songs/Secret Story Of Swan.jpeg',
                'title'=> 'Secret Story of the Swan'
            ],
            [ //12
                'path'=>'storage/songs/To heart.jpeg',
                'title'=> 'To heart'
            ],
            [ //13
                'path'=>'storage/songs/Slow journey.jpeg',
                'title'=> 'Slow Journey'
            ],
            [ //14
                'path'=>'storage/songs/wake me up.jpeg',
                'title'=> 'Wake me up'
            ],
            [ //15
                'path'=>'storage/songs/TT.jpeg',
                'title'=> 'TT'
            ],
            [ //16
                'path'=>'storage/songs/Likey.jpeg',
                'title'=> 'Likey'
            ],
            [ //17
                'path'=>'storage/songs/Love bomb.jpeg',
                'title'=> 'Love bomb'
            ],
            [ //18
                'path'=>'storage/songs/stay this way.jpeg',
                'title'=> 'Stay this way'
            ],
            [ //19
                'path'=>'storage/songs/Spring day.jpeg',
                'title'=> 'Spring day'
            ],
            [ //20
                'path'=>'storage/songs/Boy in Luv.jpeg',
                'title'=> 'Boy in luv'
            ],
            [ //21
                'path'=>'storage/songs/Butter.png',
                'title'=> 'Butter'
            ],
            [ //22
                'path'=>'storage/songs/Thrill ride.jpeg',
                'title'=> 'Thrill ride'
            ],
            [ //23
                'path'=>'storage/songs/whisper.jpeg',
                'title'=> 'Whisper'
            ],
            [ //24
                'path'=>'storage/songs/No air.jpeg',
                'title'=> 'No air'
            ],
            [ //25
                'path'=>'storage/songs/Newjeans.jpg',
                'title'=> 'newjeans'
            ],
        ]);
    }
}
