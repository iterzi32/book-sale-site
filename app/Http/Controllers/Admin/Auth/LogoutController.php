<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('warning', 'Çıkış yapıldı');

    }
}
