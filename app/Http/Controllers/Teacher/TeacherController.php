<?php

/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 18:58
 */
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController  extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        /*
        $wechatUser = session('wechat.oauth_user');

        $wechatUser = $wechatUser->getOriginal();
        */

        session('identity','parents');

        var_dump(session('identity'));
        
        $this->user = $request->user();

        /*
        if($this->user->hasRole('teacher') && !$this->user->openid)
        {
            $this->user->openid = $wechatUser['openid'];

            $this->user->save();
        }
        */
    }
}