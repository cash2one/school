<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午5:47
 */

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;

class IndexController extends HomeController
{
    /**
     * 前台选择控制器
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('welcome');
    }
}