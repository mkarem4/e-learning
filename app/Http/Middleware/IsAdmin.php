<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->guest()) {
            return redirect('/login')->with('error','you should login first.');
        }

        if (Auth::check() && Auth::user()->type == 3) {
            abort(404);
        }
        return $next($request);
    }
}
