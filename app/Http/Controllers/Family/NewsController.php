<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:36
 */

namespace App\Http\Controllers\Family;


use App\Models\Student;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends FamilyController
{
    /**
     * 通知列表
     * @param Request $request
     * @param News $news
     * @param Student $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,News $news,Student $student)
    {
        $students = $this->user->family->students;

        $arr = [];

        foreach ($students as $key => $student)
        {
            $arr[count($arr)] = $student->class_id;
        }

        $news = $news->whereIn('classes_id',$arr)->toSql();

        return view('family.news.index',[
            'news' => $news,
            'student' => $student
        ]);
    }

    /**
     * 新闻详情
     * @param Request $request
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request,News $news)
    {
        $news = $news->findOrFail($request->id);

        return view('family.news.detail',[
            'news' => $news
        ]);
    }
}