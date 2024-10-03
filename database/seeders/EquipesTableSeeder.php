<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipes')->insert([
            [
                'nom' => 'Equipe A',
                'ville' => 'Dakar',
                'statut' => 'Actif',
            ],
            [
                'nom' => 'Equipe B',
                'ville' => 'Saint-Louis',
                'statut' => 'Actif',
            ],
            [
                'nom' => 'Equipe C',
                'ville' => 'Ziguinchor',
                'statut' => 'Inactif',
            ],
        ]);
    }
}
