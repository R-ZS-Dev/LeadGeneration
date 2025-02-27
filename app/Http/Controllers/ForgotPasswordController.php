<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show forget password form
    public function showForgetPasswordForm()
    {
        return view('forget-password');
    }

    // Handle forget password request
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Find user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Generate a unique token and store it in remember_token
        $token = Str::random(60);
        $user->remember_token = $token;
        $user->save();

        // Send email with reset link
        Mail::send('emails.forget-password', ['token' => $token, 'email' => $user->email], function ($message) use ($user) {
            $message->to($user->email)
                    ->replyTo($user->email)
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Reset Your Password');
        });
        
        return back()->with('success', 'Reset password link sent to your email.');
    }

    // Show reset password form
    public function showResetPasswordForm(Request $request)
    {
        return view('reset-password', ['token' => $request->token, 'email' => $request->email]);
    }

    // Handle reset password request
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        // Find user by email and token
        $user = User::where('email', $request->email)->where('remember_token', $request->token)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->remember_token = null; // Clear token after reset
        $user->save();

        return redirect('/login')->with('success', 'Your password has been reset.');
    }
}

