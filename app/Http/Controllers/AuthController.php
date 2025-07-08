<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login'); // Menampilkan view login
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Mengecek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard ');
        }

        // Jika gagal login, kembali ke form login
        return redirect()->route('login')->withErrors(['username' => 'Username atau password salah']);
    }

    // Menampilkan halaman order janji temu setelah login
    public function welcome()
    {
        return view('orderservice');
    }


    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Invalidasi session
        $request->session()->regenerateToken(); // Regenerasi token CSRF
        return redirect()->route('home'); // Redirect ke halaman login
    }
}
