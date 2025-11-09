<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('welcome');

Route::view('dashboard', 'newdashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('newdashboard', 'dashboard')
    ->middleware( ['auth', 'verified'])
    ->name('newdashboard');

require __DIR__.'/auth.php';
