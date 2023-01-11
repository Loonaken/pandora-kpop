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
                'image_id'=> '4',
                'group_id'=> '1',
                'name'=> 'Flip That',
                'information'=> '完全体でのカムバックとしては最後の楽しい曲である',
                'emotion_id'=> '1',
                'period_id'=> '2',
            ],
            [
                'youtube_link'=> 'https://www.youtube.com/watch?v=9yDmyndI0_k',
                'image_id'=> '3',
                'group_id'=> '2',
                'name'=> 'Slow Journey',
                'information'=> '完全体でのカムバックとしては最後の楽しい曲である',
                'emotion_id'=> '4',
                'period_id'=> '4',
            ],
        ]);
    }
}
