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
use DB;
use Exception;

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

    /**
     * 存储通知信息
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Course $course)
    {
        DB::beginTransaction();

        try
        {
            foreach ($request->course_id as $item)
            {
                $course = $course->where('id', $item)->first();

                $news = News::create([
                    'user_id' => $this->user->id,
                    'school_id' => $course->school_id,
                    'grade_id' => $course->grade_id,
                    'classes_id' => $course->classes_id,
                    'category_id' => 1,
                    'name' => $request->name,
                    'descs' => $request->name,
                    'detail' => $request->detail
                ]);
            }

            DB::commit();

            return redirect('/teacher')->with('status',[
                'code' => 'success',
                'msg'  => '发布成功'
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '发布失败'
            ]);
        }
    }
}