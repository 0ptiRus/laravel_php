<?php

use App\Http\Controllers\ApiForgotPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $menuItems = [
        ['title' => 'home', 'url' => '/'],
        ['title' => 'feedback', 'url' => 'feedback'],
        ['title' => 'registration', 'url' => 'registration'],
    ];
    
    return view('main', compact("menuItems"));
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

Route::get('/forgot-password', 
    [ForgotPasswordController::class, 'index']
    )->name('password.request');

Route::post('/forgot-password', 
    [ForgotPasswordController::class, 'sendResetLinkEmail']
    )->name('password.email');

Route::get('/reset-password/{token}', 
    [ApiForgotPasswordController::class, 'index']
    )->name('password.reset');

Route::get("/feedback",
    [FeedbackController::class, "index"]
    )->name("feedback");

Route::post("/feedback",
    [FeedbackController::class, "post"]
    )->name("feedback.post");
