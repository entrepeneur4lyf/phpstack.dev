<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home;

// Replace default welcome with our Home component
Route::get('/', Home::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
