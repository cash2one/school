<?php

namespace App\Http\Middleware;

use Closure;
class HasFamily
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->hasRole('parents'))
        {
            return redirect('/student/bind');
        }

        return $next($request);
    }
}
