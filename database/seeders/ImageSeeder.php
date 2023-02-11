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
                'path'=> url("storage/songs/loona pic 4.jpeg"),
                'title'=> 'Loona',
            ],
            [
                'path'=> url('storage/songs/izone_pic_1.jpeg'),
                'title'=> 'Iz*one'
            ],
            [
                'path'=> url('storage/songs/Twice2_pic.jpeg'),
                'title'=> 'Twice'
            ],
            [
                'path'=> url('storage/songs/BTS.jpeg'),
                'title'=> 'BTS'
            ],
            [
                'path'=> url('storage/songs/The_Boyz_pic.png'),
                'title'=> 'The_Boyz'
            ],
            [
                'path'=> url('storage/songs/fromis_9_pic.jpeg'),
                'title'=> 'Fromis_9'
            ],
            [ //7
                'path'=> url('storage/songs/Loonatic.jpeg'),
                'title'=> 'loonatic'
            ],
            [ //8
                'path'=> url('storage/songs/so_what.jpeg'),
                'title'=> 'So what'
            ],
            [ //9
                'path'=> url('storage/songs/Flip that.jpeg'),
                'title'=> 'Flip that'
            ],
            [ //10
                'path'=> url('storage/songs/Violeta.jpeg'),
                'title'=> 'Violeta'
            ],
            [ //11
                'path'=> url('storage/songs/Secret Story Of Swan.jpeg'),
                'title'=> 'Secret Story of the Swan'
            ],
            [ //12
                'path'=> url('storage/songs/To heart.jpeg'),
                'title'=> 'To heart'
            ],
            [ //13
                'path'=> url('storage/songs/Slow journey.jpeg'),
                'title'=> 'Slow Journey'
            ],
            [ //14
                'path'=> url('storage/songs/wake me up.jpeg'),
                'title'=> 'Wake me up'
            ],
            [ //15
                'path'=> url('storage/songs/TT.jpeg'),
                'title'=> 'TT'
            ],
            [ //16
                'path'=> url('storage/songs/Likey.jpeg'),
                'title'=> 'Likey'
            ],
            [ //17
                'path'=> url('storage/songs/Love bomb.jpeg'),
                'title'=> 'Love bomb'
            ],
            [ //18
                'path'=> url('storage/songs/stay this way.jpeg'),
                'title'=> 'Stay this way'
            ],
            [ //19
                'path'=> url('storage/songs/Spring day.jpeg'),
                'title'=> 'Spring day'
            ],
            [ //20
                'path'=> url('storage/songs/Boy in Luv.jpeg'),
                'title'=> 'Boy in luv'
            ],
            [ //21
                'path'=> url('storage/songs/Butter.png'),
                'title'=> 'Butter'
            ],
            [ //22
                'path'=> url('storage/songs/Thrill ride.jpeg'),
                'title'=> 'Thrill ride'
            ],
            [ //23
                'path'=> url('storage/songs/whisper.jpeg'),
                'title'=> 'Whisper'
            ],
            [ //24
                'path'=> url('storage/songs/No air.jpeg'),
                'title'=> 'No air'
            ],
            [ //25
                'path'=> url('storage/songs/Newjeans.jpg'),
                'title'=> 'newjeans'
            ],
        ]);
    }
}
