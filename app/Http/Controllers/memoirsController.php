<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Memoir;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class memoirsController extends Controller
{
    public function memoirs(Request $request)
    {
        $memoirs = Memoir::where('userid', Auth::user()->userid)->get();
        session()->put('memoirs', $memoirs);
        return view('memoirs');
    }

    public function editMemoir(Request $request)
    {
        // Log the entire request to debug why it's empty
        Log::debug('Request Data:', $request->all());

        // Validate the incoming request data
        $validatedData = $request->validate([
            'body' => 'required|string',
            'category' => 'required|string',
            'mood' => 'required|string',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
        Log::info('Validated Data:', $validatedData);


        // Find the memoir by ID and update it
        $memoir = Memoir::findOrFail($request->input('memoirid'));
        $memoir->update([
            'body' => $request->input('body'),
            'category' => $request->input('category'),
            'mood' => $request->input('mood'),
            'title' => $request->input('title'),
            'date' => $request->input('date'),
        ]);
        Log::info('Updated Memoir:', $memoir->toArray());

        return redirect()->back();
    }


}
