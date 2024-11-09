<?php

namespace App\Http\Controllers;

use App\Models\StudentGuardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view("pages.auth.login");
    }

    public function loginProcess(Request $request)
    {
        $fields = $request->validate([
            'nis' => 'required|min:4|numeric',
            'password' => 'required|min:5',
        ]);

        // Menggunakan Auth::attempt untuk login
        if (Auth::attempt(['nis' => $fields['nis'], 'password' => $fields['password']], true)) {
            $request->session()->regenerate();

            return redirect()->route('user.dashboard')->with('success', 'Login successful');
        }

        // Jika login gagal
        Log::info('Invalid credentials for NIS: ' . $fields['nis']);
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('welcome')->with('success', 'Successfully logged out.');
    }
}
