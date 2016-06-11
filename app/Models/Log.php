<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午6:02
 */

namespace App\Models;


class Log extends Common
{
    protected $table = 'logs';

    /**
     * 日志记录的模型
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function model()
    {
        return $this->hasOne('App\Models\Model','id','model_id');
    }

    /**
     * 日子记录的用户操作
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function operate()
    {
        return $this->hasOne('App\Models\Operate','id','operate_id');
    }

    /**
     * 日子记录的用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}