<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Log;


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
            'username' => ['required', 'unique:user,username'],
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


    public function editProfile(Request $request)
    {
        $editprofileform = $request;
        if ($request->get('firstname') != '') {
            $editprofileform = $request->validate([
                'firstname' => ['required', 'max:25'],
            ]);
            Auth::user()->update(['firstname' => $request->get('firstname')]);
            session()->put('firstname', Auth::user()->firstname);
            session()->put('user', Auth::user());
        }
        if ($request->get('lastname') != '') {
            $editprofileform = $request->validate([
                'lastname' => ['required', 'max:25'],
            ]);
            Auth::user()->update(['lastname' => $request->get('lastname')]);
            session()->put('lastname', Auth::user()->lastname);
            session()->put('user', Auth::user());
        }
        if ($request->get('email') != '') {
            $editprofileform = $request->validate([
                'email' => ['required', 'max:25'],
            ]);
            Auth::user()->update(['email' => $request->get('email')]);
            session()->put('lastname', Auth::user()->email);
            session()->put('user', Auth::user());
        }
        if ($request->get('password') != '') {
            $editprofileform = $request->validate([
                'password' => ['required', new Password]
            ]);
            Auth::user()->update([
                'password' => Hash::make($request->input('password')),
            ]);
            session()->put('password', Auth::user()->password);
            session()->put('user', Auth::user());
        }
        if ($request->get('username') != '') {
            $username = $request->get('username');
            $exists = User::where('username', $username)->exists();
            if (!$exists) {
                $editprofileform = $request->validate([
                    'username' => ['required', 'max:25'],
                ]);
                Auth::user()->update(['username' => $request->get('username')]);
                session()->put('username', Auth::user()->username);
                session()->put('user', Auth::user());
            } else {
                return view('home')->with('alertMessage', 'username not available');

            }

        }



        return redirect()->back();
    }


    public function checkUsername(Request $request)
    {
        $username = $request->query('username');
        $exists = User::where('username', $username)->exists();

        return response()->json(['exists' => $exists]);
    }
}
