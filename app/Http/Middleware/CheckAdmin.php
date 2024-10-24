<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an admin
        if (Auth::check() && Auth::user()->role_id === 1) { 
            return $next($request);
        }

        return redirect()->route('product.index')->with('error', 'You do not have permission to access this page.');
    }
}

