<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Memoir;
use App\Models\User;

class memoirsController extends Controller
{
    public function memoirs(Request $request)
    {
        $memoirs = Memoir::where('userid', Auth::user()->userid)->get();
        session()->put('memoirs', $memoirs);
        return view('memoirs');
    }


}
