<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoueursTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('joueurs')->insert([
            [
                'nom' => 'Moussa Fall',
                'age' => 25,
                'equipe_id' => 1,
                'numeroLicence' => '123456789',
            ],
            [
                'nom' => 'Aliou Ndiaye',
                'age' => 22,
                'equipe_id' => 2,
                'numeroLicence' => '987654321',
            ],
            [
                'nom' => 'Ibrahima Diallo',
                'age' => 30,
                'equipe_id' => 3,
                'numeroLicence' => '456789123',
            ],
        ]);
    }
}
