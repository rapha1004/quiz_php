<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsAdminMiddleware;

Route::redirect('/', '/login');


Route::get('/quizzs', [QuizzController::class, 'index'])->name('quizzs.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Admin-only: list all users
    Route::get('/admin/users', [UsersController::class, 'index'])
        ->middleware(IsAdminMiddleware::class)
        ->name('admin.users.index');

    Route::delete('/admin/users/{user}', [UsersController::class, 'destroy'])
        ->middleware(IsAdminMiddleware::class)
        ->name('admin.users.destroy');
});



require __DIR__ . '/auth.php';
