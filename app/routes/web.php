<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name("main");

Route::get("/registration", 
    [RegistrationController::class, "index"]
    )->name("registration");

Route::post("/registration", 
    [RegistrationController::class, "store"]
    )->name("registration.store");

Route::get("/login", 
    [LoginController::class, "index"]
    )->name("login");

Route::post("/login", 
    [LoginController::class, "post"]
    )->name("login.post");