<?php

namespace App\Http\Controllers\Front\User\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\User\Auth\Password\ForgotRequest;
use App\Http\Requests\Front\User\Auth\Password\ResetRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ForgotController extends Controller
{
    public function showForgotForm(): View
    {
        return view('front.user.auth.forgot_password');
    }

    public function sendResetLink(ForgotRequest $request): RedirectResponse
    {
        $token = Str::random(60);
        DB::table('password_resets')->insert(
            [
                'email' => $request->input('email'),
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );
        $action_link = route('user.reset.password.form', ['token' => $token, 'email' => $request->email]);
        $body = $request->email.' ilişkili Terzi_Book hesabınızın şifresini sıfırlamak için bir talep aldık. Aşağıdaki linke tıklayarak şifrenizi sıfırlayabilirsiniz.';
        Mail::send('front.user.auth.email_forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
           $message->from('book_shop@example.com', 'Terzi Kitabevi');
           $message->to($request->email)->subject('Şifre Sıfırlama');
        });

        return redirect()->back()->with('info', 'Şifre sıfırlama linki mailinize göderildi');
    }

    public  function showResetForm(Request $request, $token = null): View
    {
        return view('front.user.auth.reset_password')->with(['token' => $token , 'email' => $request->email]);
    }

    public function resetPassword(ResetRequest $request): RedirectResponse
    {
        $checkToken = DB::table('password_resets')->where(
            [
                'email' => $request->email,
                'token' => $request->token,
            ]
        )->first();

        if (!$checkToken) {
            return redirect()->back()->with('error', 'Geçersiz token');
        } else {
            User::query()->where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where('email', $request->email)->delete();
            return redirect()->route('user.login')->with('info', 'Şifreniz güncellendi');
        }
    }
}
