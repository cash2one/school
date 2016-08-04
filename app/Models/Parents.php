<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/8
 * Time: 下午6:54
 */

namespace App\Models;


class Parents extends Common
{
    protected $table = 'parents';

    /**
     * 获取家长的所有学生
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany('App\Models\Student','parent_student','parent_id','student_id');
    }

    /**
     * 获取相关用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}