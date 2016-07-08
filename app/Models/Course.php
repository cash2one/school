<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/7
 * Time: 15:34
 */

namespace App\Models;


class Course extends Common
{
    protected $table = 'courses';

    /**
     * 任课老师
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher','id','teacher_id');
    }

    /**
     * 课程所在年级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        return $this->hasOne('App\Models\Grade','id','grade_id');
    }

    /**
     * 班级信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classes()
    {
        return $this->hasOne('App\Models\Classes','id','classes_id');
    }
}