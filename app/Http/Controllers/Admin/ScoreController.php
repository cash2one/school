<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/7
 * Time: 16:16
 */

namespace App\Http\Controllers\Admin;


use App\Models\Exam;
use App\Models\Score;
use Illuminate\Http\Request;
use DB;
use Exception;

class ScoreController extends AdminController
{
    /**
     * 录入成绩
     * @param Exam $exam
     * @param Request $request
     * @return mixed
     */
    public function add(Exam $exam,Request $request)
    {
        $exam = $exam->findOrFail($request->id);

        return view('admin.score.add',[
            'exam' => $exam
        ]);
    }

    /**
     * 存储成绩单
     * @param Request $request
     * @param Score $score
     * @param Exam $exam
     */
    public function store(Request $request,Score $score,Exam $exam)
    {
        $students = $request->val;
        //dd($request->all());
        $scoreArr = [];

        $i = 0;

        foreach ($students as $key => $student)
        {
            foreach ($student as $cou => $item)
            {
                $scoreArr[$i]['student_id'] = $key;

                $scoreArr[$i]['course_id'] = $cou;

                $scoreArr[$i]['exam_id'] = $request->exam_id;

                $scoreArr[$i]['val'] = $item;

                $scoreArr[$i]['created_at'] = time();

                $scoreArr[$i]['updated_at'] = time();

                $i++;
            }
        }

        DB::beginTransaction();

        try
        {
            DB::table('scores')->insert($scoreArr);

            DB::commit();

            return redirect()->back()->with('status',[
                'code' => 'success',
                'msg'  => '保存成功',
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '保存失败',
            ]);
        }
    }

    /**
     * 获取成绩
     * @param $course_id
     * @param $student_id
     * @param $exam_id
     * @return mixed
     */
    public static function getVal($course_id,$student_id,$exam_id)
    {
        $score = new Score();

        $score = $score->where([
            'course_id' => $course_id,
            'student_id' => $student_id,
            'exam_id' => $exam_id
        ])->first();

        return $score->val;
    }
}