<?php

use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/register', function () {
    return view("/register");
});
Route::post('/register', [registerController::class, 'register']);

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
