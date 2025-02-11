<?php

namespace App\Http\Controllers;

use Str;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
     // Show Forgot Password Form
     public function showForgotForm()
     {
         return view('auth.forgot-password');
     }
 
     // Send Reset Link
     public function sendResetLink(Request $request)
     {
         $request->validate(['email' => 'required|email|exists:users,email']);
 
         // Generate Token
         $token = Str::random(60);
 
         // Save token in database
         DB::table('password_reset_tokens')->insert([
             'email' => $request->email,
             'token' => $token,
             'created_at' => Carbon::now(),
         ]);
 
         // Send Email (Manually ya Laravel Mail Use Karke)
         Mail::send('auth.reset-email', ['token' => $token], function($message) use ($request) {
             $message->to($request->email);
             $message->subject('Reset Password Notification');
         });
 
         return back()->with('message', 'Reset link sent to your email!');
     }
 
     // Show Reset Password Form
     public function showResetForm($token)
     {
         return view('auth.reset-password', ['token' => $token]);
     }
 
     // Reset Password
     public function resetPassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users,email',
             'password' => 'required|min:6|confirmed',
             'token' => 'required'
         ]);
 
         // Find token in database
         $resetData = DB::table('password_reset_tokens')
             ->where('email', $request->email)
             ->where('token', $request->token)
             ->first();
 
         if (!$resetData) {
             return back()->withErrors(['email' => 'Invalid token or email']);
         }
 
         // Update user password
         User::where('email', $request->email)->update([
             'password' => Hash::make($request->password)
         ]);
 
         // Delete token after successful password reset
         DB::table('password_reset_tokens')->where('email', $request->email)->delete();
 
         return redirect('/login')->with('success', 'Your password has been reset!');
     }
}
