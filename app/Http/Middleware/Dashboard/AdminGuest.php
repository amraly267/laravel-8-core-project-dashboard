<?php

namespace App\Http\Middleware\Dashboard;

use Illuminate\Support\Facades\Redirect;
use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminGuest
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check())
        {
            return redirect()->route('admin-home');
        }

        return $next($request);
    }
}
