<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

/**
 * "Users" route
 */

Route::get("/", [UsersController::class, "index"]);
Route::post("/", [UsersController::class, "store"]);
Route::get("/{id}", [UsersController::class, "show"]);
