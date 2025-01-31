<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\UserController;


use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\DonationController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/user/{id}', [UserController::class, 'index']);


Route::get('/posts', [PostController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
 

    
    Route::post('/donation', [DonationController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);
    
});
