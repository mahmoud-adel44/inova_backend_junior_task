<?php

use App\Http\Controllers\Post\IndexPostController;
use App\Http\Controllers\Post\ReviewPostController;
use App\Http\Controllers\Post\StorePostController;
use App\Http\Controllers\Post\TopPostController;
use Illuminate\Support\Facades\Route;

Route::post('/posts',StorePostController::class);
Route::get('/users/{user}/posts',IndexPostController::class);
Route::get('/posts/top',TopPostController::class);
Route::post('/posts/{post}/reviews',ReviewPostController::class);
