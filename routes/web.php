<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\Frontend\WellcomeController::class, 'welcome'])->name('welcome');
Route::get('/posts', [\App\Http\Controllers\Frontend\PostController::class, 'index'])->name('frontend.posts.index');
Route::get('/posts/{post:slug}', [\App\Http\Controllers\Frontend\PostController::class, 'show'])->name('frontend.posts.show');
