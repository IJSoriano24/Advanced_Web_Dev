<?php

use App\Http\Controllers\DragonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbilityController;
use Illuminate\Support\Facades\Route;

//welcome page route
Route::get('/', function () {
    return view('welcome');
});

//dashboard route with auth and verifieed users.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//group routes that require authentication
Route::middleware('auth')->group(function () {
    //profile management routes(view, update and delete)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dragons', DragonController::class);

    Route::resource('dragons.abilities', AbilityController::class)
    ->only(['create', 'store']);

    Route::get('/abilities', [AbilityController::class, 'index'])->name('abilities.index');
Route::get('/abilities/{ability}/edit', [AbilityController::class, 'edit'])->name('abilities.edit');
Route::put('/abilities/{ability}', [AbilityController::class, 'update'])->name('abilities.update');
Route::delete('/abilities/{ability}', [AbilityController::class, 'destroy'])->name('abilities.destroy');



//     // Route::post('dragons/{dragon}/abilities',[AbilityController::class, 'store'])->name('abilities.store');
// Route::resource('abilities', AbilityController::class)->except(['create','store']);

    
});

  

//Dragon resource routes which map to the DragonController methods




//default auth routes provided by Laravel Breeze
require __DIR__.'/auth.php';

