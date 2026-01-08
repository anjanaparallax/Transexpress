<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Staff API Routes
Route::prefix('staff')->group(function () {
    // Login route 
    Route::post('/login', [AuthController::class, 'login']);

    // Login Routes (Protected)
    Route::middleware('auth:staff')->group(function () {
        // Staff CRUD operations can be added here
    });
});