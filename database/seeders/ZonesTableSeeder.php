<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('zones')->insert([
            [
                'nom' => 'Zone A',
            ],
            [
                'nom' => 'Zone B',
            ],
            [
                'nom' => 'Zone C',
            ],
        ]);
    }
}
