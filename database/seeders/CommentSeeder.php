<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
            'user_id' => '1',
            'title'=> '最近のK-POPについて',
            'body' => '最近はIVEとかNewJeansとかのガールズグループが人気になってきたよね',
            'created_at'=>'2022/1/20 12:18:11'
            ],
            [
            'user_id' => '2',
            'title'=> '最近のK-POP人気',
            'body' => 'ガールズグループも人気だけど、ボーイズグループもめっちゃ演出すごくなってるよね！',
            'created_at'=>'2022/1/23 12:18:11'
            ],
            [
            'user_id' => '1',
            'title'=> 'Twiceについて',
            'body' => '最近グループも好きだけど、やっぱりTwiceだよね',
            'created_at'=>'2022/1/24 12:18:11'
            ],
    ]);
    }
}
