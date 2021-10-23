<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

    public function getPassword($token)
    {

        return view('customauth.passwords.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|email|exists:users',
            'name' => 'required|string|exists:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',

        ],
            [
                'email.required'=>'you have not enter your email, please check again.',
                'email.unique' => 'email does not exit or is incorrect, please check again.',
                'email.email' => 'you have not entered the correct your email format, please check again.',
                'name.required' => 'you have not enter your user name, please check again.',
                'name.exists' => 'name does not exit or is incorrect, please check again.',
                'password.required' => 'you have not enter your password, please check again.',
                'password.min' => 'password must be at min 6 characters',
                'password_confirmation.required' => 'you have not re-entered your password, please check again.',
                'password_confirmation.same' => 'password does not match, please check again.',


            ]
        );

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token,'name' => $request->name,])
            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('/')->with('message', 'Your password has been changed!');

    }
}
