<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=SPYX2y4NzTU',
                'image_id'=> '9',
                'group_id'=> '1',
                'name'=> 'Flip That',
                'information'=> '完全体でのカムバックとしては最後の楽しい曲である',
                'emotion_id'=> '1',
                'period_id'=> '2',
            ],
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=9yDmyndI0_k',
                'image_id'=> '13',
                'group_id'=> '2',
                'name'=> 'Slow Journey',
                'information'=> '完全体でのカムバックとしては最後の楽しい曲である',
                'emotion_id'=> '2',
                'period_id'=> '5',
            ],
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=ePpPVE-GGJw',
                'image_id'=> '15',
                'group_id'=> '3',
                'name'=> 'TT',
                'information'=> 'TTダンスがブームとなった。',
                'emotion_id'=> '3',
                'period_id'=> '4',
            ],
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=WMweEpGlu_U',
                'image_id'=> '21',
                'group_id'=> '4',
                'name'=> 'Butter',
                'information'=> '大衆ウケする英語の曲',
                'emotion_id'=> '4',
                'period_id'=> '3',
            ],
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=pYRSY1Kv3YY',
                'image_id'=> '23',
                'group_id'=> '5',
                'name'=> 'Whisper',
                'information'=> '中毒性がある楽しい曲',
                'emotion_id'=> '5',
                'period_id'=> '1',
            ],
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=JC6budcACNE',
                'image_id'=> '18',
                'group_id'=> '6',
                'name'=> 'Stay this way',
                'information'=> 'サマーソングである',
                'emotion_id'=> '1',
                'period_id'=> '1',
            ],
            [ //7
                'youtube_link'=> 'https://www.youtube.com/watch?v=XznW8Ti6WWk',
                'image_id'=> '7',
                'group_id'=> '1',
                'name'=> 'Loonatic',
                'information'=> '',
                'emotion_id'=> '3',
                'period_id'=> '4',
            ],
            [ //8
                'youtube_link'=> 'https://www.youtube.com/watch?v=GEo5bmUKFvI',
                'image_id'=> '8',
                'group_id'=> '1',
                'name'=> 'So What',
                'information'=> '',
                'emotion_id'=> '3',
                'period_id'=> '4',
            ],
            [ //9
                'youtube_link'=> 'https://www.youtube.com/watch?v=6eEZ7DJMzuk',
                'image_id'=> '10',
                'group_id'=> '2',
                'name'=> 'Violeta',
                'information'=> '',
                'emotion_id'=> '4',
                'period_id'=> '5',
            ],
            [ //10
                'youtube_link'=> 'https://www.youtube.com/watch?v=nnVjsos40qk',
                'image_id'=> '11',
                'group_id'=> '2',
                'name'=> 'Secret Story of the Swan',
                'information'=> '',
                'emotion_id'=> '2',
                'period_id'=> '3',
            ],
            [ //11
                'youtube_link'=> 'https://www.youtube.com/watch?v=V2hlQkVJZhE',
                'image_id'=> '16',
                'group_id'=> '3',
                'name'=> 'Likey',
                'information'=> '',
                'emotion_id'=> '1',
                'period_id'=> '5',
            ],
            [ //12
                'youtube_link'=> 'https://www.youtube.com/watch?v=DdLYSziSXII',
                'image_id'=> '14',
                'group_id'=> '3',
                'name'=> 'Wake Me Up',
                'information'=> '',
                'emotion_id'=> '1',
                'period_id'=> '4',
            ],
            [ //13
                'youtube_link'=> 'https://www.youtube.com/watch?v=-SK6cvkK4c0',
                'image_id'=> '17',
                'group_id'=> '6',
                'name'=> 'Love Bomb',
                'information'=> '',
                'emotion_id'=> '1',
                'period_id'=> '3',
            ],
            [ //14
                'youtube_link'=> 'https://www.youtube.com/watch?v=iFUHS1Ei7qw',
                'image_id'=> '12',
                'group_id'=> '6',
                'name'=> 'To Heart',
                'information'=> '',
                'emotion_id'=> '4',
                'period_id'=> '4',
            ],
            [ //15
                'youtube_link'=> 'https://www.youtube.com/watch?v=m8MfJg68oCs',
                'image_id'=> '20',
                'group_id'=> '4',
                'name'=> 'Boy In Luv',
                'information'=> '',
                'emotion_id'=> '5',
                'period_id'=> '4',
            ],
            [ //16
                'youtube_link'=> 'https://www.youtube.com/watch?v=xEeFrLSkMm8',
                'image_id'=> '19',
                'group_id'=> '4',
                'name'=> 'Spring day',
                'information'=> '',
                'emotion_id'=> '6',
                'period_id'=> '3',
            ],
            [ //17
                'youtube_link'=> 'https://www.youtube.com/watch?v=8n6pRkpVsyU',
                'image_id'=> '24',
                'group_id'=> '5',
                'name'=> 'No air',
                'information'=> '',
                'emotion_id'=> '4',
                'period_id'=> '3',
            ],
            [ //18
                'youtube_link'=> 'https://www.youtube.com/watch?v=XMs2CIiqRDI',
                'image_id'=> '22',
                'group_id'=> '5',
                'name'=> 'Thrill ride',
                'information'=> '',
                'emotion_id'=> '5',
                'period_id'=> '2',
            ],

        ]);
    }
}
