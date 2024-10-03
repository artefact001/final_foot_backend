<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Notifications\UserCreatedNotification;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string'
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::findOrCreate($request->role);
        $user->assignRole($role);

        // Envoyer un e-mail avec les identifiants
        $user->notify(new UserCreatedNotification($user->email, $request->password));

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }
}
