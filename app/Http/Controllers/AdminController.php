<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
 
        // dd($credentials);
        // Attempt authentication
        if (Auth::attempt($credentials)) {
            // Regenerate session for security
            $request->session()->regenerate();
            
            // Log successful login
            Log::info("User authenticated", [
                'email' => $credentials['email'],
                'ip' => $request->ip(),
                'time' => now()
            ]);

            return redirect()->intended('/dashboard');
            
        }

        // Log failed attempt
        Log::warning("Failed authentication attempt", [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'time' => now()
        ]);

        return response()->json([
            'error' => 'Invalid credentials',
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'ip' => $request->ip(),
            'time' => now()

        ], 401);
    }


    function dashboard()
    {
        return view('admin.dashboard');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Log logout action
        Log::info("User logged out", [
            'email' => Auth::user() ? Auth::user()->email : 'N/A',
            'ip' => $request->ip(),
            'time' => now()
        ]);

        return redirect('/')->with('message', 'Successfully logged out.');
    }
}
