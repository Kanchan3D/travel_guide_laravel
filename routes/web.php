<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Query;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/', function () {
    return view('home');
});

Route::get('/query', [Query::class, 'index'])->name('query.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/signup', [RegisterController::class, 'show'])->name('signup.show');
Route::post('/signup', [RegisterController::class, 'store'])->name('signup.store');
Route::post('/query', [Query::class, 'store'])->name('query.store');

