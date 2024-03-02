<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('z', 'password');

        if (AuthController::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/register');
        }

        // Authentication failed
        return redirect()->back()->withErrors(['msg', 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('login.register');
    }

    // menyimpan pengguna yang baru terdaftar
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string', // sesuaikan dengan kebutuhan Anda
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // jika berhasil, arahkan ke halaman selamat datang atau halaman lain yang sesuai
        return redirect('/home');
    }
}
