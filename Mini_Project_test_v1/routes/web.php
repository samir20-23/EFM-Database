<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HikeController;   
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('/hikes', [HikeController::class, 'index'])->name('hikes.index');
Route::resource('reviews', ReviewController::class);
Route::get('article/{id}', [ArticleController::class, 'show'])->name('article.show');