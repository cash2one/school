<?php
/**
 * Created by PhpStorm.
 * User: dingyuanyuan
 * Date: 16/6/8
 * Time: 下午6:53
 */

namespace App\Models;


class Category extends Common
{
    protected $table = 'categorys';

    /**
     * 获取当前分类的所有子集
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany($this,'parent_id','id');
    }

    /**
     * 获取分类下的所有新闻
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article','category_id','id');
    }
}