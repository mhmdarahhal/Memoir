<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\memoirsController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;




Route::middleware(['web'])->group(function () {
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [registerController::class, 'register']);

    Route::get('/', function () {
        return view("/login");
    });
    Route::get('/login', function () {
        return view("/login");
    })->name('login');
    Route::post('/login', [authController::class, 'login']);

    Route::get('/home', function () {
        return view("/home");
    })->name('home');

    Route::post('/save-now', [homeController::class, 'saveNow'])->name('save.now');


    Route::get('/memoirs', [memoirsController::class, 'memoirs'])->name('memoirs');

    Route::post('/logout', [authController::class, 'logout'])->name('logout');


});

