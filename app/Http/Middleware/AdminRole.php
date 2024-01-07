<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // if (Auth::check() && Auth::user()->role === 'admin') {
        if (Auth::user()) {
            // User is an admin, allow access
            return $next($request);
        }


        // User is not an admin, redirect or return an error response
        // return redirect()->route('login')->withErrors(['message' => 'Login as admin first.']);
        return redirect()->intended('login');
    }
}
