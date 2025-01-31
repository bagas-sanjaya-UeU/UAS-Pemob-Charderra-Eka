<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\IndexController;
// post controller
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\DonationController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    
    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('dashboard.posts.index');
    Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');
    Route::post('/dashboard/posts', [PostController::class, 'store'])->name('dashboard.posts.store');
    Route::get('/dashboard/posts/{id}', [PostController::class, 'show'])->name('dashboard.posts.show');
    Route::get('/dashboard/posts/{id}/edit', [PostController::class, 'edit'])->name('dashboard.posts.edit');
    Route::put('/dashboard/posts/{id}', [PostController::class, 'update'])->name('dashboard.posts.update');
    Route::delete('/dashboard/posts/{id}', [PostController::class, 'destroy'])->name('dashboard.posts.destroy');


    Route::get('/dashboard/donations', [DonationController::class, 'index'])->name('dashboard.donations.index');

});