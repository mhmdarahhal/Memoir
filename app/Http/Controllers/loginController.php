<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request)
    {
        "<script>alert('You have been logged in!')</script>";

        return view('home');
    }
}
