<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, "store"]);
Route::put("/books/{book}", [BookController::class, 'update']);
Route::delete("/books/{book}", [BookController::class, "destroy"]);

Route::post("/register", [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);