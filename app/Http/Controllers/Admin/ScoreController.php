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
use App\Models\Student;
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

            return redirect('/admin/exam/classes/'.$request->exam_id)->with('status',[
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
     * 修改学生成绩
     * @param Request $request
     * @param Score $score
     * @param Exam $exam
     * @param Student $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request,Score $score,Exam $exam,Student $student)
    {
        $student = $student->where('id',$request->student_id)->first();

        if(!$student || $student->classes->id != $this->user->classes->id)
        {
            return response()->json([
                'code' => 'success',
                'msg' => '您不具备修改权限'
            ]);
        }

        $exam = $exam->where('id',$request->exam_id)->first();

        $score = $score->where([
            'exam_id' => $exam->id,
            'student_id' => $student->id,
            'course_id' => $request->course_id
        ])->first();

        $score->val = $request->val;

        if($score->save())
        {
            $total = [];

            foreach ($exam->scores as $score)
            {
                if(!isset($total[$score->student_id]))
                {
                    $total[$score->student_id] = 0;
                }

                $total[$score->student_id] += $score->val;
            }

            asort($total);

            return response()->json([
                'code' => 'success',
                'msg' => '修改成功',
                'total' => $total[$student->id],
                'sort' => $this->getSort($total[$student->id],$total)
            ]);
        }

        return response()->json([
            'code' => 'success',
            'msg' => '修改失败'
        ]);
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

    /**
     * 获取排名
     * @param $score
     * @param $total
     * @return int|string
     */
    public static function getSort($score,$total)
    {
        rsort($total);

        foreach ($total as $key => $item)
        {
            if($item == $score)
            {
                return $key + 1;
            }
        }
    }

    /**
     * 获取成绩排名
     * @param Exam $exam
     * @param Student $student
     * @return int|string
     */
    public static function getExamStudentSort(Exam $exam,Student $student)
    {
        $scores = $exam->scores;

        $total = [];

        foreach ($scores as $score)
        {
            if(!isset($total[$score->student_id]))
            {
                $total[$score->student_id] = 0;
            }

            $total[$score->student_id] += $score->val;
        }

        rsort($total);

        foreach ($total as $key => $item)
        {
            if($item == $total[$student->id])
            {
                return $key + 1;
            }
        }

        return 0;
    }

    /**
     * 获取学生考试成绩
     * @param Exam $exam
     * @param Student $student
     * @return int|mixed
     */
    public static function getExamStudentTotal(Exam $exam,Student $student)
    {
        $scores = $exam->scores;

        $total = [];

        foreach ($scores as $score)
        {
            if(!isset($total[$score->student_id]))
            {
                $total[$score->student_id] = 0;
            }

            $total[$score->student_id] += $score->val;
        }

        if(isset($total[$student->id]))
        {
            return $total[$student->id];
        }

        return 0;
    }
}