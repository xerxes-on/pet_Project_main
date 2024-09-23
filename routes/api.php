<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('trending_books', [BookController::class, 'trending_books']);
Route::get('suggestions', [BookController::class, 'suggestions']);


require __DIR__.'/auth.php';
require __DIR__.'/authRoutes.php';

