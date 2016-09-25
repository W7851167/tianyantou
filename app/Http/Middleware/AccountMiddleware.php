<?php

namespace App\Http\Middleware;

use Closure;

class AccountMiddleware
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
        $user = \Session::get('user.passport');

        if ($user or $request->is('signin.html') or $request->is('register.html') or $request->is('')) {

            return $next($request);
        }

        return redirect('signin.html');
    }
}
