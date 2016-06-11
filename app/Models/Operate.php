<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午6:03
 */

namespace App\Models;


class Operate extends Common
{
    protected $table = 'operates';

    /**
     * 当前操作下的所有日志
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Models\Log','operate_id','id');
    }
}