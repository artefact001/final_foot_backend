<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Existing store method
    public function store(Request $request)
    {
        // $request->validate([
        //     'nom' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6',
        //     'role' => 'required|string'
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        $role = \Spatie\Permission\Models\Role::findOrCreate($request->role);
        $user->assignRole($role);

        // Send a notification email with login credentials
        // $user->notify(new \App\Http\Notifications\UserCreatedNotification($user->email, $request->password));

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    // Adding the index method
    public function index()
    {
        // Fetch all users
        $users = User::all();

        // Return a JSON response or a view with users
        return response()->json(['users' => $users]);
    }
}
