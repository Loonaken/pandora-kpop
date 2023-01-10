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
                'name'=> 'BTS',
                'type'=> '1',
                'information'=> '世界的に広く活躍されているK-popの枠組みを超えたグループである。',
                'image_id'=> '2',
                'sort_order'=> '2',
            ],
            [
                'name'=> 'Bigbang',
                'type'=> '1',
                'information'=> '初期のK-popを牽引した5人組のグループである。',
                'image_id'=> '1',
                'sort_order'=> '1',
            ],
        ]);
    }
}
