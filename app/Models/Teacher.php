<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/8
 * Time: 下午6:50
 */

namespace App\Models;

class Teacher extends Common
{
    protected $table = 'teachers';

    public function user()
    {

    }

    /**
     * 获取老师代课班级
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes()
    {
        return $this->belongsToMany('App\Models\Classes','teacher_class','teacher_id','class_id');
    }

    /**
     * 老师任教的课程
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course','teacher_id','id');
    }
}