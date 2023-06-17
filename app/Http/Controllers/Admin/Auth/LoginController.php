<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use function Symfony\Component\String\b;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        $status = Auth::guard('admin')->attempt($credentials);
        if ($status) {
            return redirect()->route('admin.index')->with('message', 'Hoşgeldiniz');
        } else {
            return redirect()->back()->with('error', 'Giriş bilgilerinizi kontrol edin.');
        }
    }
}
