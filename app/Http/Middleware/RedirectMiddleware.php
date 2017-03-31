<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RedirectMiddleware
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
        $routename = \Route::currentRouteName();
        if (!in_array($routename, ['passport']) && !$request->ajax()) {
            $url = $request->url();
            Session::put('previous', $url);
        }

        return $next($request);
    }
}
