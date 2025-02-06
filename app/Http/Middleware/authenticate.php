<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
        //     return redirect('/email/verify')->with('error', 'Please verify your email first.');
        // }
        //     return $next($request);
        if(Auth::check()){
            return $next($request);
        }
        else{
            return redirect('/login');
        }
    }
}
