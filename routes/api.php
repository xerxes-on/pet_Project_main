<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\json;

Route::post('login', [AuthController::class, 'login']);


Route::get('login', function (){
       return response()->json(['message'=> "Login please"]);
   })->name('login');

Route::post('register', [AuthController::class, 'register']);

Route::get('books', [PageController::class, 'catalog']);
Route::post('books/search', [PageController::class, 'search']);

Route::get('quotes', [PageController::class, 'quotes']);
Route::get('quotes/search', [PageController::class, 'quote_search']);

Route::get('authors', [PageController::class, 'authors']);
Route::post('authors/search', [PageController::class, 'author_search']);


Route::middleware('auth:sanctum')->group(function (){
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('profile', [UserController::class, 'profile']);
        Route::put('profile_edit', [UserController::class, 'store']);
        Route::get('mybooks', [UserController::class, 'my_books']);
        Route::get('my_quotes', [UserController::class, 'my_liked_quotes']);
        Route::apiResource('reviews', ReviewController::class);

});

