<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsAdminMiddleware;

Route::redirect("/", "/login");

Route::middleware("auth")->group(function () {
    Route::get("/quizzs", [QuizzController::class, "index"])->name("quizzs.index");
    Route::get("/quizzs/{quizzId}/question/{questionNumber?}", [QuizzController::class, "participate"])->name("quizzs.participate");
    
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");

    Route::get("/dashboard", function () {
        return view("dashboard");
    })
        ->middleware(["verified"])
        ->name("dashboard");

    // Admin-only: list all users
    Route::get("/dashboard/admin/users", [UsersController::class, "index"])
        ->middleware(IsAdminMiddleware::class)
        ->name("admin.users.index");

    Route::get("/dashboard/admin/users/{user}/edit", [UsersController::class, "edit"])
        ->middleware(IsAdminMiddleware::class)
        ->name("admin.users.edit");

    Route::put("/dashboard/admin/users/{user}", [UsersController::class, "update"])
        ->middleware(IsAdminMiddleware::class)
        ->name("admin.users.update");

    Route::delete("/dashboard/admin/users/{user}", [UsersController::class, "destroy"])
        ->middleware(IsAdminMiddleware::class)
        ->name("admin.users.destroy");
});

require __DIR__ . "/auth.php";
