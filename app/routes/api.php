<?php
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApiForgotPasswordController;

Route::post("login", [ApiLoginController::class, 'login']);

Route::middleware("auth:sanctum")->get("post", [PostController::class, "test"]);

Route::post('reset-password', 
    [ApiForgotPasswordController::class, 'reset']
    )->name('password.update');