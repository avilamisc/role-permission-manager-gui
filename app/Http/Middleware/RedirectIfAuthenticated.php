<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->hasRole('user')){
                return redirect('/user/dashboard');
            } else if(Auth::user()->hasRole('admin')){
                return redirect('/admin/dashboard');
            } else if(Auth::user()->hasRole('superadmin')){
                return redirect('/superadmin/dashboard');
            } else {
                return redirect('/');
            }
            // return redirect('/home');
        }

        return $next($request);
    }
}
