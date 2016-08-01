<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/30
 * Time: 10:41
 */

namespace App\Models;


class Order extends Common
{
    protected $table = 'orders';

    public function student()
    {
        return $this->hasOne('App\Models\Student','id','student_id');
    }
}