<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books',[BookController::class,'getAllBooks']);
Route::get('/books/{id}',[BookController::class,'getBook']);

Route::post('/books',[BookController::class,'createBook']);
Route::put('/books/{id}',[BookController::class,'updateBook']);
Route::delete('/books/{id}',[BookController::class,'deleteBook']);