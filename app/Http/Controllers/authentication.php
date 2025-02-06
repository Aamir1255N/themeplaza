<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Rules\Recaptcha;
// use Illuminate\Auth\Events\Registered;

class authentication extends Controller
{
    function login(Request $req){
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|email|max:255',
            'password' => 'required|string|min:8', 
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
          if (Auth::attempt(['email' => $req->name, 'password' => $req->password])) {
              return redirect('/')->with("success","Login Successfully."); 
          }
          return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
     }
    function register(Request $req){
        $validator = Validator::make($req->all(), [
            'name' => 'required|alpha_num|between:3,20',
            'email' => 'required|email', 
            'confirm_email' => 'required|email|same:email', 
            'password' => 'required|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/', 
            'confirm_password' => 'required|same:password', 
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput(); 
        }

        // $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            //     'secret' => config('services.recaptcha.secret_key'),
            //     'response' => $req->input('g-recaptcha-response'),
            // ]);
            // if (!$response['success']) {
                //     return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA verification failed.'])->withInput();
                // }
                // dd($validator);
                // User::create($validator);
                $user = new user;
                $user->name = $req->name;
                $user->email = $req->email;
                $user->password = $req->password;
                $user->save();
                // event(new Registered($user));
        // $user->sendEmailVerificationNotification();
        return redirect('/login')->with('success','Your account has been successfully created');
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}