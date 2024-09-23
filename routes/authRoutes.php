<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;

Route::middleware('auth:api')->group(function () {
    Route::resources([
        'books' => BookController::class,
        'quotes' => QuoteController::class,
        'authors' => AuthorController::class,
        'reviews' => ReviewController::class,
    ]);
    Route::get('my_books', [UserController::class, 'my_books']);
    Route::get('my_quotes', [UserController::class, 'my_liked_quotes']);
    Route::post('profile', [UserController::class, 'profile']);
    Route::put('profile_edit', [UserController::class, 'store']);

    Route::put('/follow/{user}', [UserController::class, 'follow']);

    Route::put('/authors/{author}/follow', [AuthorController::class, 'follow']);

    Route::put('/reviews/{id}/like', [ReviewController::class, 'like']);
    Route::put('/quotes/{id}/like', [QuoteController::class, 'like']);

    Route::post('books/reviews/{book_id}', [BookController::class, 'get_reviews']);

});
