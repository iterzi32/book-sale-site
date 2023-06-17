<?php

namespace App\Http\Controllers\Front\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\User\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        $status = Auth::guard('web')->attempt($credentials);
        if ($status) {
            return redirect()->route('user.index')->with('message', 'Hoşgeldiniz');
        } else {
            return redirect()->back()->with('error', 'Bilgilerinizi kontrol ediniz');
        }
    }
}
