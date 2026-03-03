<?php

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'getToken']);

Route::middleware('auth:administrador')->group(function () {
    Route::get('/me', [AuthController::class, 'ver']);
    Route::post('/logout', [AuthController::class, 'logoutApi']);
});