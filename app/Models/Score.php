<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/7
 * Time: 16:31
 */

namespace App\Models;


class Score extends Common
{
    protected $table = 'scores';

    /**
     * 当前成绩所属测验
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->hasOne('App\Models\Exam','id','exam_id');
    }

    /**
     * 所属课程
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Course()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }

    /**
     * 所属学生
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne('App\Models\Student','id','student_id');
    }
}