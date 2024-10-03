<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'nom' => 'Championnat Régional',
                'dateDebut' => '2024-01-10',
                'dateFin' => '2024-03-30',
            ],
            [
                'nom' => 'Coupe Nationale',
                'dateDebut' => '2024-04-01',
                'dateFin' => '2024-06-20',
            ],
            [
                'nom' => 'Tournoi Local',
                'dateDebut' => '2024-07-01',
                'dateFin' => '2024-07-30',
            ],
        ]);
    }
}
