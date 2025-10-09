<?php

namespace App\Http\Controllers\feature\bo\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function index() {
        // dd("ok");
        return view('feature.bo.auth.index');
    }

    function auth(Request $request) {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard("admin")->attempt($credentials)) {
            return redirect()->route('admin.home')->with('success', 'Halo selamat datang '.auth()->guard("admin")->user()->name);
        }
        return back()->with('error', config('error','nama pengguna atau password tidak sesuai'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route("admin.login");
    }
}
