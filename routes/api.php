<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;







Route::post("/register", [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);


Route::middleware('auth:sanctum')->group(function(){

    Route::controller(UserController::class)->group(function(){
        Route::get('/user',  "user");
        Route::post('/logout', "logout");   
    });

    

    Route::controller(BookController::class)->group(function() {
        Route::get('/books', 'index')->withoutMiddleware('auth:sanctum');
        Route::post('/books',"store");
        Route::put("/books/{book}",'update');
        Route::delete("/books/{book}",'destroy');
    });

});
