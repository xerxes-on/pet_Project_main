<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resources([
    'books'=>BookController::class,
    'quotes'=>QuoteController::class,
    'authors'=>AuthorController::class,
    'reviews'=>ReviewController::class,
]);
Route::post('search', [PageController::class, 'search']);

Route::middleware('auth:api')->group(function (){
        Route::post('/quotes', [QuoteController::class, 'store']);
        Route::post('/quotes/{quote}', [QuoteController::class, 'update']);
        Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy']);

        Route::post('/reviews', [ReviewController::class, 'store']);
        Route::post('/reviews/{review}', [ReviewController::class, 'update']);
        Route::delete('/reviews/{review}', [ReviewController::class, 'destroy']);

        Route::get('mybooks', [UserController::class, 'my_books']);
        Route::get('my_quotes', [UserController::class, 'my_liked_quotes']);
});

require (__DIR__.'/auth.php');
