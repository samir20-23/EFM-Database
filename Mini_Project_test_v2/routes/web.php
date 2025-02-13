<?php

use App\Http\Controllers\HikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

    // Route::get('/hikes', [HikeController::class, 'index'])->name('hikes.index');
    // Route::get('/hikes/{hike}', [HikeController::class, 'show'])->name('hikes.show');
    // Route::post('/hikes/{hike}/views', [HikeController::class, 'incrementViews'])->name('hikes.incrementViews');
    // Route::post('/reviews/{review}/views', [ReviewController::class, 'incrementViews'])->name('reviews.incrementViews');
    // Route::get('/reviews/{}', [HikeController::class, 'index'])->name('hikes.index');
Route::resource('/reviews', ReviewController::class);
Route::resource('/hikes', HikeController::class);