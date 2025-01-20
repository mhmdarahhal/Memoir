<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class memoirsController extends Controller
{
    public function memoirs(Request $request)
    {

        return view('memoirs');
    }
}
