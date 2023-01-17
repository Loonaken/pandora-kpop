<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name'=> 'Loona',
                'type'=> '2',
                'information'=> '2016年から一人ずつソロデビューをして2018年に完全体のデビューを果たした今後の活躍が注目されているグループである。',
                'image_id'=> '1',
                'sort_order'=> '1',
            ],
            [
                'name'=> 'Iz*one',
                'type'=> '2',
                'information'=> 'サバイバル番組であるプロデュース48から生まれた日本人3人韓国人9人で構成されているグループである。',
                'image_id'=> '2',
                'sort_order'=> '1',
            ],
            [
                'name'=> 'Twice',
                'type'=> '2',
                'information'=> 'グループ結成から7年以上であるレジェンドグループ。',
                'image_id'=> '3',
                'sort_order'=> '1',
            ],
            [
                'name'=> 'BTS',
                'type'=> '1',
                'information'=> '世界的に広く活躍されているK-popの枠組みを超えたグループである。',
                'image_id'=> '4',
                'sort_order'=> '2',
            ],
            [
                'name'=> 'The_Boyz',
                'type'=> '1',
                'information'=> '初期のK-popを牽引した5人組のグループである。',
                'image_id'=> '5',
                'sort_order'=> '1',
            ],
            [
                'name'=> 'Fromis_9',
                'type'=> '2',
                'information'=> 'アイドル学校というサバイバル番組から生まれた数々のヒット曲を生み出した人気グループです。
                　旧メンバーにはギュリがいます。',
                'image_id'=> '6',
                'sort_order'=> '1',
            ],
        ]);
    }
}
