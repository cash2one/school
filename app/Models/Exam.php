<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/7
 * Time: 16:31
 */

namespace App\Models;


class Exam extends Common
{
    protected $table = 'exams';

    /**
     * 成绩单
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany('App\Models\Score','exam_id','id');
    }

    /**
     * 所属班级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classes()
    {
        return $this->hasOne('App\Models\Classes','id','classes_id');
    }

    /**
     * 所属年级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        return $this->hasOne('App\Models\Grade','id','grade_id');
    }

    /**
     * 所属学校
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne('App\Models\School','id','school_id');
    }
}