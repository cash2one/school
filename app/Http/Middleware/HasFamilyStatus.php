<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class HasFamilyStatus
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
        $items = DB::table('parent_student')->where([
            'parent_id' => $request->user()->family->id
        ])->get();

        foreach ($items as $item)
        {
            if($item->end_time == 0)
            {
                return redirect('/notice')->with('status',[
                    'code' => 'fail',
                    'msg'  => '你未付费'
                ]);
            }

            if($item->end_time < time())
            {
                return redirect('/notice')->with('status',[
                    'code' => 'fail',
                    'msg'  => '您的服务已到期'
                ]);
            }
        }

        return $next($request);
    }
}
