<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 15:23
 */

namespace App\Models;


class Activity extends Common
{
    protected $table = 'activitys';

    protected $fillable = ['name', 'user_id', 'classes_id', 'grade_id', 'school_id', 'teacher_id', 'start_at', 'end_at', 'detail'];

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
     * 评分
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany('App\Models\ActivityScore','activity_id','id');
    }

    /**
     * 所属教师
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        return $this->hasOne('App\Models\teacher','id','teacher_id');
    }
}