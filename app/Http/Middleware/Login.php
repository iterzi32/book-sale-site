<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'admin' :
                    return redirect()->route('admin.login');
                case 'web' :
                    return redirect()->route('user.login');
            }
        }
        return $next($request);
    }
}
