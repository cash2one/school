<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 16:16
 */

namespace App\Models;


class ActivityScore extends Common
{
    protected $table = 'activity_score';

    /**
     * 学生
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne('App\Models\Student','id','student_id');
    }
}