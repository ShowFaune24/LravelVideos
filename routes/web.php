<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/books/trashed", [BookController::class, "trashed"])->name
("books.trashed");
Route::post("/books/{book}/restore", [BookController::class, "restore"])->withTrashed()->name("books.restore");
Route::resource("/books", BookController::class);
