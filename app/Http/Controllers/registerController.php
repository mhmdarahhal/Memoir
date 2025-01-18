<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class registerController extends Controller
{
    public function register(Request $request)
    {
        "<script>alert('You have been registered!')</script>";

        $registerform = $request->validate([
            'firstname' => ['required', 'max:25'],
            'lastname' => ['required', 'max:25'],
            'gender' => ['required', 'max:6'],
            'dateofbirth' => ['required', 'date'],
            'username' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', new Password]
        ]);
        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'dateofbirth' => $request->input('dateofbirth'),
            'password' => Hash::make($request->input('password')),
        ]);
        return view('login');
    }
}
