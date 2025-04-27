<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // login.blade.php
    }

    public function login(Request $request)
    {
        // Add login logic here (validation, auth, redirect)
    }

    public function showSignupForm()
    {
        return view('signup'); // signup.blade.php
    }

    public function signup(Request $request)
    {
        // Add signup logic here (validation, user creation, redirect)
    }
}
