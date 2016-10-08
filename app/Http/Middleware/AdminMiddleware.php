<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
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
        $user = Session::get('user.passport');

        if (($user && $user['role'] != 0) or $request->is('passport/login') or $request->is('passport/logout')) {

            return $next($request);
        }

        return redirect('passport/login');
    }
}
