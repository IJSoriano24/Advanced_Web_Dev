<?php

use App\Http\Controllers\DragonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dragons', DragonController::class);
});

//This route will call the show() method in the DragonController

    Route::get('/dragons', [DragonController::class, 'index'])->name('dragons.index');
    Route::get('/dragons/create', [DragonController::class, 'create'])->name('dragons.create');
    Route::get('/dragons/{dragon}', [DragonController::class, 'show'])->name('dragons.show');
    Route::post('/dragons', [DragonController::class, 'store'])->name('dragons.store');
    
    Route::get('/dragons/{dragon}/edit', [DragonController::class, 'edit'])->name('dragons.edit');
    Route::put('/dragons/{dragon}', [DragonController::class, 'update'])->name('dragons.update');
    Route::delete('/dragons/{dragon}', [DragonController::class, 'destroy'])->name('dragons.destroy');


require __DIR__.'/auth.php';
