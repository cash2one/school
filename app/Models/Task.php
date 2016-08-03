<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 11:14
 */

namespace App\Models;


class Task extends Common
{
    protected $table = 'tasks';

    protected $fillable = ['classes_id','teacher_id','grade_id','school_id','course_id','name','detail'];

    /**
     * 班级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classes()
    {
        return $this->hasOne('App\Models\Classes','id','classes_id');
    }

    /**
     * 年级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        return $this->hasOne('App\Models\Grade','id','grade_id');
    }

    /**
     * 学校
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne('App\Models\School','id','school_id');
    }

    /**
     * 课程
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}