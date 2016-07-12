<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 14:37
 */

namespace App\Models;

class Message extends Common
{
    protected $table = 'messages';

    /**
     * 接收用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUser()
    {
        return $this->hasOne('App\Models\User','id','to_user_id');
    }

    /**
     * 发送用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postUser()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}