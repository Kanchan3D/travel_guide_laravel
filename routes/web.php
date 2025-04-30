<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Query;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SignupController;


Route::get('/', function () {
    return view('home');
});

// Route::get('/query', [Query::class, 'index'])->name('query.index');
// Route::get('/query', [Query::class, 'index'])->middleware('auth')->name('query.index');
// Route::get('/query', [Query::class, 'index'])->middleware('auth')->name('query.index');
// Route::post('/query', [Query::class, 'store'])->name('query.store');


Route::get('/query', [Query::class, 'index'])->middleware('auth')->name('query.index');
Route::post('/query', [Query::class, 'store'])->middleware('auth')->name('query.store');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/signup', [SignupController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');






Route::get('/signup', [SignupController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');