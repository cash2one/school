<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/8
 * Time: 下午6:52
 */

namespace App\Models;


class Classes extends Common
{
    protected $table = 'classes';

    /**
     * 获取当前班级所在学校
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne('App\Models\Student','id','schoole_id');
    }

    /**
     * 获取当前班级所在年级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        return $this->hasOne('App\Models\Grade','id','grade_id');
    }

    /**
     * 获取当前班级的学生
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Models\Students','class_id','id');
    }

    /**
     * 获取当前班级的教师
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_class','class_id','teacher_id');
    }

    /**
     * 班级负责人
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function principal()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}