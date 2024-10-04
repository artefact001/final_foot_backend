<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $User=User::create([
         
                'name' => 'chekh Sané',
                'email' => 'cheikhsane@gmail.com',
                'password' => Hash::make('password123'),
                // 'role' => 'admin',
         
        
        ]);
        $User->assignRole('Admin');
    }
}
