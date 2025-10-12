<?php

// app/Http/Controllers/User/Auth/UserAuthController.php
namespace App\Http\Controllers\feature\fo\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('feature.fo.auth.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // buang intended yang “nyangkut” ke admin
        $request->session()->forget('url.intended');

        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            // Arahkan ke halaman user yang pasti, JANGAN ke route guest
            return redirect()->route('fo.home.index'); // atau route('user.dashboard') jika ada
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('feature.fo.auth.register');
    }

    // App\Http\Controllers\feature\fo\auth\UserAuthController.php



    public function register(Request $request)
    {
        $data = $request->validate([
            'nik' => ['required', 'string', 'max:32', 'unique:users,nik'],
            'name' => ['required', 'string', 'max:100'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:1000'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'no_hp' => ['required', 'string', 'max:32', 'regex:/^[0-9+][0-9\s\\-()]*$/'],
            'password' => ['required', \Illuminate\Validation\Rules\Password::min(8)->letters()->numbers(), 'confirmed'],
        ]);

        // jika ada sesi admin aktif, logout dulu
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        $request->session()->forget('url.intended');
        Auth::shouldUse('web');

        $user = \App\Models\User::create([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'password' => $data['password'], // auto-hash via casts
            'role' => 'user',
        ]);

        Auth::guard('web')->login($user);
        $request->session()->regenerate();

        // JANGAN ke route('user.login') (itu guest). Arahkan ke halaman user.
        return redirect()->route('fo.home.index'); // atau route('user.dashboard') kalau ada
    }



    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('fo.home.index');
    }

}
