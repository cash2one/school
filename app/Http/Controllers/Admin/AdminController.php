<?php

/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午5:48
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }
}