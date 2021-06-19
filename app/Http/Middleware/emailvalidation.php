<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class emailvalidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        return auth()->user() && auth()->user()->email_verified_at<>null ? $next($request) // Will pass user.
        : redirect('verification'); // Will redirect user to the main page if email is not verified.
    }     
    
}
