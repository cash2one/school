<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午5:47
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }
}