<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emotions')->insert([
            [
                'term'=> '2023',
                'sort_order'=> '1'
            ],
            [
                'term'=> '2022',
                'sort_order'=> '2'
            ],
            [
                'term'=> '2021',
                'sort_order'=> '1'
            ],
            [
                'term'=> '2020',
                'sort_order'=> '2'
            ],
            [
                'term'=> '2019',
                'sort_order'=> '1'
            ],
        ]);
    }
}
