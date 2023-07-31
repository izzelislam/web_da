<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
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
        // dd(auth()->guard('admin')->check());
        if (auth()->guard('admin')->check()) {
            return $next($request);
        }

        // abort 403 if user is not admin
        return redirect()->route('admin-auth.index');
    }
}
