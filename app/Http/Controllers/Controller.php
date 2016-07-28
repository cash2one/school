<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * 用于存储微信用户对象
     * @var mixed
     */
    protected $oauthUser;

    /**
     * 初始化使用微信登录
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->oauthUser = session('wechat.oauth_user');

        dd($this->oauthUser->openid);

        $user = $this->storeUser($this->oauthUser->getOriginal());

        if(!$this->authUser($user,$this->oauthUser->getOrigubal()))
        {
            abort(403);
        }
    }

    /**
     * 存储用户并返回一个用户对象
     * @param $data
     * @return User
     */
    private function storeUser($data)
    {
        $user = new User();

        $user = $user->where('openid',$data['openid'])->first();

        if(!$user)
        {
            $user->name = '游客';

            $user->email = $data['openid'].'@sanchi.xin';

            $user->password = bcrypt($data['openid']);

            $user->openid = $data['openid'];

            $user->save();
        }

        return $user;
    }

    /**
     * 用户认证
     * @param User $user
     * @param $data
     * @return bool
     */
    private function authUser(User $user,$data)
    {
        return Auth::attempt([
            'email' => $user->email,
            'password' => $data['openid']
        ]);
    }
}
