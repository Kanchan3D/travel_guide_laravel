<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show the signup page
    public function show()
    {
        return view('auth.signup');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|string|min:8|confirmed', // expects password_confirmation field
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Optional: login the user directly after signup
        auth()->login($user);

        // Redirect to home or dashboard
        return redirect()->route('login')->with('success', 'Your account has been created');

    }
}
