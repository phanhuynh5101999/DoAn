<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

        return view('customauth.passwords.email');
    }

    public function postEmail(Request $request)
    {


        $request->validate([
            'email' => 'required|email|exists:users',
            'name' => 'required|string|exists:users',
        ]);

        $token = Str::random(64);
        $user = DB::table('users')
            ->where(['email' => $request->email,'name' => $request->name,])
            ->first();
        if ( !$user )
            return back()->withInput()->with('error', 'Invalid token!');

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'name' => $request->name,'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
