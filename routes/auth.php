<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;



Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showregister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

});

Route::middleware('auth')->group(function () {

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
