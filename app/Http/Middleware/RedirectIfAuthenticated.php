<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (get_class(Auth::guard($guard)->user()) === Admin::class) {
                   return redirect()->route('admin.index');
                } elseif (get_class(Auth::guard($guard)->user()) === User::class) {
                    return redirect()->route('user.index');
                }
            }
        }
        return $next($request);
    }
}
