<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午5:47
 */

namespace App\Http\Controllers\Home;

use App\Models\Role;

class IndexController extends HomeController
{
    /**
     * 前台选择控制器
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Role $role)
    {
        $roles = $role->where('user_id',$this->user->id)->get();

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