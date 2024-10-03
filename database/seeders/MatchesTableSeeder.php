<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('matchs')->insert([
            [
                'date' => '2024-03-01',
                'equipeLocale_id' => 1,
                'equipeVisiteuse_id' => 2,
                'scoreLocale' => 2,
                'scoreVisiteur' => 1,
            ],
            [
                'date' => '2024-03-02',
                'equipeLocale_id' => 3,
                'equipeVisiteuse_id' => 1,
                'scoreLocale' => 1,
                'scoreVisiteur' => 3,
            ],
            [
                'date' => '2024-03-03',
                'equipeLocale_id' => 2,
                'equipeVisiteuse_id' => 3,
                'scoreLocale' => 0,
                'scoreVisiteur' => 0,
            ],
        ]);
    }
}
