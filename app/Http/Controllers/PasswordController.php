<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller {
    
    
    public function request() {
        return view('auth.forgot-password');
    }

    
    public function email(Request $request) {
        $request->validate(['email' => 'required|email|exists:users,email']);
        
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Ссылка успешно отправлена на почту!')
            : back()->withErrors(['email' => __($status)]);
    }

    
    public function reset($token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    
    public function update(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

       
        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

       
        if ($record) {
            $user = User::where('email', $request->email)->first();
            
            if ($user) {
                
                $user->update([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ]);

                DB::table('password_reset_tokens')->where('email', $request->email)->delete();

                return redirect('/login')->with('success', 'Пароль успешно изменен! Войдите с новым паролем.');
            }
        }

        return back()->withErrors(['email' => 'Не удалось сбросить пароль. Возможно, ссылка устарела.']);
    }
}