<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/7
 * Time: 16:39
 */

namespace App\Http\Controllers\Admin;


use App\Models\Classes;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends AdminController
{
    /**
     * 班级测验
     * @return mixed
     */
    public function classes()
    {
        $exams = $this->user->classes->exams()->paginate(20);

        return view('admin.exam.index',[
            'exams' => $exams
        ]);
    }

    /**
     * 新增考试
     * @param Request $request
     * @param Classes $classes
     * @return mixed
     */
    public function add(Request $request,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        return view('admin.exam.add',[
            'classes' => $classes
        ]);
    }

    /**
     * 编辑考试信息
     * @param Request $request
     * @param Classes $classes
     * @param Exam $exam
     * @return mixed
     */
    public function edit(Request $request,Classes $classes,Exam $exam)
    {
        $classes = $classes->findOrFail($this->user->classes->id);

        $exam = $exam->findOrFail($request->id);

        return view('admin.exam.edit',[
            'classes' => $classes,
            'exam' => $exam
        ]);
    }

    /**
     * 存储考试信息
     * @param Request $request
     * @param Classes $classes
     * @param Exam $exam
     * @return mixed
     */
    public function store(Request $request,Classes $classes,Exam $exam)
    {
        $classes = $classes->findOrFail($request->classes_id);

        if($request->id)
        {
            $exam = $exam->findOrFail($request->id);
        }

        $exam->name = $request->name;

        $exam->classes_id = $classes->id;

        $exam->school_id = $classes->school->id;

        $exam->grade_id = $classes->grade->id;

        if($exam->save())
        {
            return redirect()->back()->with('status',[
                'code' => 'success',
                'msg'  => '保存成功'
            ]);
        }

        return redirect()->back()->with('status',[
            'code' => 'error',
            'msg'  => '保存失败'
        ]);
    }

    /**
     * 显示考试详情
     * @param Request $request
     * @param Exam $exam
     * @return mixed
     */
    public function detail(Request $request,Exam $exam)
    {
        $exam = $exam->findOrFail($request->id);

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

        return view('admin.exam.detail',[
            'exam' => $exam,
            'total' => $total
        ]);
    }
}