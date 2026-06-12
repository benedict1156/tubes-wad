<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /* ===== LOGIN ===== */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // ⬇️ redirect ke dashboard
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ])->withInput();
}

    /* ===== REGISTER ===== */
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register1(Request $request)
    {
        
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }

    /* ===== PROFILE ===== */
    public function profile()
    {
        return view('profile');
    }

    /* ===== LOGOUT ===== */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
