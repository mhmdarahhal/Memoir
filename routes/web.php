<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\memoirsController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;



<<<<<<< HEAD
=======

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
    });
    Route::post('/login', [loginController::class, 'login']);

    Route::get('/home', function () {
        return view("/home");
    })->name('home');

    Route::post('/save-now', [homeController::class, 'saveNow'])->name('save.now');


    Route::get('/memoirs', [memoirsController::class, 'memoirs'])->name('memoirs');
});


// Route::get('/', function () {
//     return view('login');
// });
// Route::post('/', function () {
//     return view('login');
// });

// Route::get('/home', function () {
//     return view('home');
// });
// Route::post('/home', function () {
//     return view('home');
// });

// Route::get('/register', function () {
//     return view('register');
// });
// Route::post('/register', function () {
//     return view('register');
// });

// Route::get('/memoirs', function () {
//     return view('memoirs');
// });
// Route::post('/memoirs', function () {
//     return view('memoirs');
// });

>>>>>>> affcd23ecc5b6f433e5c2ab6d6013b5134615113
