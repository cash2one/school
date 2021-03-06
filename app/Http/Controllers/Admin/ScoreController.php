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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
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

                if($item == '')
                {
                    $item = 0;
                }

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

        if(!$score)
        {
            $score = new Score();

            $score->exam_id = $exam->id;

            $score->student_id = $student->id;

            $score->course_id = $request->course_id;
        }

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
}