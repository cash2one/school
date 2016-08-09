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
        $student = $student->findOrFail($request->id);

        $news = $news->where([
            'school_id' => $student->school_id
        ])->orderBy('id','desc')->paginate(25);

        return view('family.news.index',[
            'news' => $news,
            'student' => $student
        ]);
    }
}