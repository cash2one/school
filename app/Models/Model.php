<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/11
 * Time: 下午6:02
 */

namespace App\Models;


class Model extends Common
{
    protected $table = 'models';

    /**
     * 当前模型所有日志
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Model\Log','model_id','id');
    }
}