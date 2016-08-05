<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/5
 * Time: 18:46
 */

namespace App\Http\Controllers\Admin;
use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Exception;

class TeacherController extends AdminController
{
    /**
     * 教师列表
     * @param Teacher $teacher
     * @return mixed
     */
    public function index(Teacher $teacher)
    {
        $teachers = $teacher->where('school_id',$this->user->school->id)->paginate(25);

        return view('admin.teacher.index',[
            'teachers' => $teachers
        ]);
    }

    /**
     * 新增教师
     * @return mixed
     */
    public function add()
    {
        return view('admin.teacher.add');
    }

    /**
     * 修改教师信息
     * @param Request $request
     * @param Teacher $teacher
     * @return mixed
     */
    public function edit(Request $request,Teacher $teacher)
    {
        $teacher = $teacher->findOrFail($request->id);

        return view('admin.teacher.edit',[
            'teacher' => $teacher
        ]);
    }

    /**
     * 存储教师信息
     * @param School $school
     * @param Request $request
     * @param Teacher $teacher
     * @param User $user
     * @return mixed
     */
    public function store(School $school,Request $request,Teacher $teacher,User $user)
    {
        DB::beginTransaction();

        try
        {
            $school = $school->findOrFail($this->user->school->id); //获取学校信息

            if(!$school)
            {
                return redirect()->back()->with('status',[
                    'code' => 'error',
                    'msg'  => '保存失败，学校不存在！'
                ]);
            }

            $this->validate($request,[
                'name' => 'required',
                'teacher_id'  => 'required',
                'mobile' => 'required'
            ]);

            if($request->id)
            {
                $teacher = $teacher->findOrFail($request->id);
            }

            $teacher->user_id = 0;
            $teacher->name = $request->name;
            $teacher->school_id = $school->id;
            $teacher->teacher_id = $request->teacher_id;
            $teacher->mobile = $request->mobile;
            $teacher->save();

            DB::commit();

            return redirect('/admin/teacher')->with('status',[
                'code' => 'success',
                'msg'  => '保存成功'
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '保存失败'.$e->getMessage()
            ]);
        }
    }
}