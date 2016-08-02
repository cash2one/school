<?php

namespace App\Http\Middleware;

use Closure;


class HasTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->hasRole('teacher'))
        {
            return redirect('/bind/teacher');
        }

        session('identity','teacher');

        return $next($request);
    }
}
