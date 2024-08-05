<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('layouts/index');
//});
Route::get('/books-intro', function () {
    return view('layouts/explore');
});

Route::get('/books', [PageController::class, 'catalog']);
Route::post('/book/search', [PageController::class, 'search'])->name('book.search');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
//    Route::get('/edit_profile', [UserController::class, 'edit'])->name('edit_profile');
//    Route::patch('/edit_profile', [UserController::class, 'store'])->name('store_profile');
});

