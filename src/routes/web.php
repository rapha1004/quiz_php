<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizzController;

Route::get("/", [HomeController::class, 'index']);
Route::get("/quizzs", [QuizzController::class, 'index']);
