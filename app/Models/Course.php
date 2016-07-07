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
}