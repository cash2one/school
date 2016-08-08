<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/8
 * Time: 11:25
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Course;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends TeacherController
{
    /**
     * 发布通知
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('teacher.news.add',[
            'courses' => $this->user->teacher->courses
        ]);
    }

    public function store(Request $request,Course $course)
    {
        foreach ($request->course_id as $item)
        {
            $course = $course->where('id',$item)->first();

            $news = News::create([
                'user_id' => $this->user->id,
                'school_id' => $course->school_id,
                'grade_id' => $course->grade_id,
                'classes_id' => $course->classes_id,
                'category_id' => $course->category_id,
                'name' => $request->name,
                'descs' => $request->name,
                'detail' => $request->detail
            ]);


        }
    }
}