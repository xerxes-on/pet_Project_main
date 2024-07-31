<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/edit_profile', [UserController::class, 'edit'])->name('edit_profile');
    Route::put('/edit_profile', [UserController::class, 'store'])->name('store_profile');


});

require __DIR__.'/auth.php';
