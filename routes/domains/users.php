<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

/**
 * "Users" route
 */

/**
 * Example
 */
//Route::get("/", [UsersController::class, "index"]);

/**
 * Register a new user
 */
Route::post("/", [UsersController::class, "store"]);

/**
 * Return the profile user
 */
Route::get("/{id}", [UsersController::class, "show"])->middleware([
    "auth:sanctum",
    "verified",
]);
