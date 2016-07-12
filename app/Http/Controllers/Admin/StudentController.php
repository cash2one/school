<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/30
 * Time: 22:43
 */

namespace App\Http\Controllers\Admin;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use Exception;

class StudentController extends AdminController
{
    public function index()
    {

    }

    /**
     * 新增学生
     * @param Request $request
     * @param Classes $classes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        if($this->user->classes->id != $classes->id)
        {
            abort(403);
        }

        return view('admin.student.add',[
            'classes' => $classes
        ]);
    }

    /**
     * 编辑学生
     * @param Request $request
     * @param Student $student
     * @param Classes $classes
     * @return mixed
     */
    public function edit(Request $request,Student $student,Classes $classes)
    {

        $student = $student->findOrFail($request->id);

        return view('admin.student.edit',[
            'student' => $student
        ]);
    }

    /**
     * 存储学生
     * @param Request $request
     * @param Student $student
     * @return mixed
     * @throws Exception
     */
    public function store(Request $request,Student $student)
    {
        //校验字段
        $this->validate($request,[
            'name' => 'required',
            'sex' => 'required',
            'student_id' => 'required'
        ]);

        DB::beginTransaction();
        //鉴定权限
        if(!$this->user->hasRole('director') || $this->user->classes->id != $request->classes_id)
        {
            throw new Exception('您没有权限执行此操作！');
        }

        try {

            if ($request->id)
            {
                $student = $student->where('id',$request->id)->first();

                if(!$student)
                {
                    throw new Exception('没有找到想关班级！');
                }
            }
            else
            {
                $student->class_id = $request->classes_id;

                $student->school_id = $this->user->classes->school->id;

                $student->grade_id = $this->user->classes->grade->id;
            }

            $student->student_id = $request->student_id;

            $student->sex_id = $request->sex;

            $student->name = $request->name;

            $student->family_mobile = $request->family_mobile;

            $student->save();

            DB::commit();

            return redirect()->back()->with('status',[
                'code' => 'success',
                'msg'  => '保存成功'
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '保存失败'.$e->getCode()
            ]);
        }
    }
}