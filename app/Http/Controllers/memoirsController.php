<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Memoir;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class memoirsController extends Controller
{
    public function memoirs(Request $request)
    {
        $memoirs = Memoir::where('userid', Auth::user()->userid)->get();
        session()->put('memoirs', $memoirs);
        function getStats()
        {
            $userid = Auth::user()->userid;
            $totalentries = DB::table('memoir')->where('userid', $userid)->count();

            $totalMoods = DB::table('memoir')->where('userid', $userid)->count();

            $happyCount = DB::table('memoir')->where('userid', $userid)->where('mood', 'Happy')->count();
            $sadCount = DB::table('memoir')->where('userid', $userid)->where('mood', 'Sad')->count();
            $excitedCount = DB::table('memoir')->where('userid', $userid)->where('mood', 'Excited')->count();
            $thoughtfulCount = DB::table('memoir')->where('userid', $userid)->where('mood', 'Thoughtful')->count();

            $entriesThisWeek = DB::table('memoir')
                ->where('userid', $userid)
                ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
                ->count();

            $entriesThisMonth = DB::table('memoir')
                ->where('userid', $userid)
                ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
                ->count();

            session([
                'totalentries' => $totalentries,
                'entriesThisWeek' => $entriesThisWeek,
                'entriesThisMonth' => $entriesThisMonth,
                'totalMoods' => $totalMoods,
                'happyCount' => $happyCount,
                'sadCount' => $sadCount,
                'excitedCount' => $excitedCount,
                'thoughtfulCount' => $thoughtfulCount,
            ]);

        }
        getStats();
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
