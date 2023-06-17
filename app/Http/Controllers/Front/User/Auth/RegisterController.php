<?php

namespace App\Http\Controllers\Front\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\User\Auth\RegisterRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function register(): View
    {
        return view('front.user.auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->fill($request->toArray())->save();
        return redirect()->route('user.login')->with('message', 'Kayıt Başarılı');
    }
}
