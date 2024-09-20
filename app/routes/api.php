<?php
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\PostController;

Route::post("login", [ApiLoginController::class, 'login']);

Route::middleware("auth:sanctum")->get("post", [PostController::class, "test"]);