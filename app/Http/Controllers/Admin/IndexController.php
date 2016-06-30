<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午5:49
 */

namespace App\Http\Controllers\Admin;

class IndexController extends AdminController
{
    public function index()
    {

        return view('admin.dashboard');
    }
}