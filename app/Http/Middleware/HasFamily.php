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
        dd($request->user()->hasRole('parents'));

        if(!$request->user()->hasRole('family'))
        {
            return redirect('/student/bind');
        }

        return $next($request);
    }
}
