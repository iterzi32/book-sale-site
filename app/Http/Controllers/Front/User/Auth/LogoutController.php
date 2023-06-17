<?php

namespace App\Http\Controllers\Front\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.index')->with('warning', 'Çıkış Yapıldı');
    }
}
