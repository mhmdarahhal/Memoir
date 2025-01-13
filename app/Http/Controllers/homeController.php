<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function saveNow(Request $request)
    {
        // Handle the POST request
        // Add your logic here
        return view('home')->with('status', 'Saved successfully!');
    }
}
