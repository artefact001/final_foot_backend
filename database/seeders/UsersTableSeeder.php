<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                // 'role' => 'admin',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password456'),
                // 'role' => 'coach',
            ],
            [
                'name' => 'Player One',
                'email' => 'player1@example.com',
                'password' => Hash::make('password789'),
                // 'role' => 'player',
            ],
        ]);
    }
}
