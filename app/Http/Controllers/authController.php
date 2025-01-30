<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $username = Auth::user()->username;
            $firstname = DB::table('user')->where('username', Auth::user()->username)->value('firstname');
            session(['username' => $username, 'firstname' => $firstname, 'user' => Auth::user()]);
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
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'login_error' => 'The provided username or password is incorrect.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();  // Clear all session data
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');

    }
}
