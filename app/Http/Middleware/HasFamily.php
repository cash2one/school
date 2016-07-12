<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class HasFamily
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if(!$request->user()->hasRole('family'))
        {
            return redirect('/student/bind');
        }

        return $next($request);
    }
}
