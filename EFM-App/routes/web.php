<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HikeController; 

use App\Http\Controllers\ReviewController;
 

Route::get('/', function () {
    return view('welcome');
}); 
// Auth::routes();   

Route::get('/hikes', [HikeController::class, 'index'])->name('hikes.index');
Route::get('/hikes/{id}', [HikeController::class, 'show'])->name('hikes.show');

Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');