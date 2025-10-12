<?php


// app/Http/Middleware/RedirectIfAuthenticatedUser.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }
        return $next($request);
    }
}
