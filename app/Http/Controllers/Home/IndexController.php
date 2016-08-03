<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午5:47
 */

namespace App\Http\Controllers\Home;

use DB;

class IndexController extends HomeController
{
    /**
     * 前台选择控制器，用户分流
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        $roles = DB::table('role_user')->where('user_id',$this->user->id)->get();

        if(count($roles) == 2 || count($roles) == 0)
        {
            return view('welcome');
        }

        if($this->user->hasRole('teacher'))
        {
            return redirect('/teacher');
        }

        if($this->user->hasRole('parents'))
        {
            return redirect('/family');
        }
    }
}