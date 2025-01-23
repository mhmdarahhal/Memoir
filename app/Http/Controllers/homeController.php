<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Memoir;
use Illuminate\Support\Facades\Log;
use Exception;

class homeController extends Controller
{
    public function saveNow(Request $request)
    {
        Log::info(
            $data = $request->only(['body', 'category', 'mood', 'title', 'date'])
        );

        // Validate the incoming request data
        $validatedData = $request->validate([
            'body' => 'required|string',
            'category' => 'required|string',
            'mood' => 'required|string',
            'title' => 'required|string',
            'date' => 'required|date',
        ]);
        Log::info('Validated Data:', $validatedData);

        try {
            // Create a new memoir
            $memoir = Memoir::create([
                'body' => $request->input('body'),
                'category' => $request->input('category'),
                'mood' => $request->input('mood'),
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'userid' => Auth::id() // Assuming the user is authenticated
            ]);
            Log::info('Created Memoir:', $memoir->toArray());

            // Redirect back to the home page with a success message
            return redirect()->route('home')->with('success', 'Memoir created successfully.');
        } catch (Exception $e) {
            Log::error('Error creating memoir: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Failed to create memoir.');
        }
    }

    public function home(Request $request)
    {
        $username = Auth::user()->username;
        return view('home')->with('username', $username);
    }

}
