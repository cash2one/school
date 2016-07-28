<?php

namespace App\Http\Middleware;

use Closure;

class HasClient
{
    /**
     * 用于检测是否是微信内打开的链接
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        if(!strpos($request->header('user-agent'),'MicroMessenger'))
        {
            return redirect('/admin');
        }

        return $next($request);
    }
}
