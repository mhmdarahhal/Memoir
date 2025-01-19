<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class memoirsController extends Controller
{
    public function memoirs(Request $request)
    {
        $username = Auth::user()->username; // Retrieve the username of the logged-in user
        return view('memoirs', compact('username')); // Pass the username to the "memoirs" view

    }
}
