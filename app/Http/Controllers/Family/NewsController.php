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

        $sql = "";

        foreach ($students as $student)
        {
            if($sql == '')
            {
                $sql = "classes_id = ".$student->classes_id;
            }
            else
            {
                $sql .= 'or classes_id = '.$student->classes_id;
            }
        }

        $news = $news->whereRaw($sql)->paginate(25);

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