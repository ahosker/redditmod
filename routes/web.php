<?php

use Illuminate\Support\Facades\Route;

include 'auth.php';

//Guest Only Routes
Route::middleware(['guest'])->group(function () {
    Route::view('/', 'welcome')->name('home');
});

//Auth Only Routesclea
Route::middleware(['auth', 'App\Http\Middleware\HaveRedditAccount'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

Route::get('test', App\Http\Controllers\Test::class);
