<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/8
 * Time: 下午6:53
 */

namespace App\Models;


class Grade extends Common
{
    protected $table = 'grades';

    /**
     * 获取当前年级都有哪些学校开设
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function school()
    {
        return $this->belongsToMany('App\Models\School','school_grade','grade_id','school_id');
    }

    /**
     * 获取当前年级下的所有班级
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        return $this->hasMany('App\Models\Classes','grade_id','id');
    }

    /**
     * 获取年级下所有学生
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Models\Student','grade_id','id');
    }
}