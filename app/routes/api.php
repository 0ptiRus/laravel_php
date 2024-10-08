<?php
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApiForgotPasswordController;
use App\Http\Controllers\ApiFeedbackController;

Route::post("login", [ApiLoginController::class, 'login']);

Route::middleware("auth:sanctum")->get("post", [PostController::class, "test"]);

Route::post('reset-password', 
    [ApiForgotPasswordController::class, 'reset']
    )->name('password.update');

Route::post("feedback", [ApiFeedbackController::class, 'feedback']);