<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class homeController extends Controller
{
    public function saveNow(Request $request)
    {
        // Handle the POST request
        // Add your logic here
        return view('home')->with('status', 'Saved successfully!');
    }

    public function home(Request $request)
    {
        $username = Auth::user()->username; // Retrieve the username of the logged-in user
        return view('home', compact('username')); // Pass the username to the "memoirs" view
    }

}
