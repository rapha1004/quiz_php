<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\UsersController;

Route::get("/", [HomeController::class, 'index']);
Route::get("/quizzs", [QuizzController::class, 'index']);
Route::get("/users", [UsersController::class, 'index']);
