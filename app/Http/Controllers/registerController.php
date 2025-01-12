<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Password;

class registerController extends Controller
{
    public function register(Request $request)
    {
        "<script>alert('You have been registered!')</script>";

        $registerform = $request->validate([
            'firstname' => ['required', 'max:25'],
            'lastname' => ['required', 'max:25'],
            'dateofbirth' => ['required', 'date'],
            'username' => ['required',],
            'email' => ['required', 'email'],
            'password' => ['required', new Password]
        ]);
        return view('login');
    }
}
