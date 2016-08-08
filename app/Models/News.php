<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/8
 * Time: 11:30
 */

namespace App\Models;


class News extends Common
{
    protected $table = 'news';

    protected $fillable = ['user_id','school_id','grade_id','classes_id','category_id','name','descs','detail'];
}