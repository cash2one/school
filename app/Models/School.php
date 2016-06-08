<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/8
 * Time: 下午6:59
 */

namespace App\Models;


class School extends Common
{
    protected $table = 'schooles';

    /**
     * 获取学校下所有年级
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades()
    {
        return $this->belongsToMany('App\Models\Grade','school_grade','school_id','grade_id');
    }

    /**
     * 获取学校所有的班级
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        return $this->hasMany('App\Models\Classes','school_id','id');
    }

    /**
     * 获取学校的所有学生
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Models\Schoole','school_id','id');
    }

    /**
     * 获取学校的所有老师
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teachers()
    {
        return $this->hasMany('App\Models\Teacher','school_id','id');
    }
}