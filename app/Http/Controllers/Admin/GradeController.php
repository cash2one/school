<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/5
 * Time: 16:55
 */

namespace App\Http\Controllers\Admin;


use App\Models\Grade;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Exception;

class GradeController extends AdminController
{
    /**
     * 年级列表
     * @param Grade $grade
     * @return mixed
     */
    public function index(Grade $grade)
    {
        $grades = $grade->where('school_id',$this->user->school->id)->get();

        return view('admin.grade.index',[
            'grades' => $grades
        ]);
    }

    /**
     * 新增年级
     * @return mixed
     */
    public function add()
    {
        return view('admin.grade.add');
    }

    /**
     * 编辑年级
     * @param Request $request
     * @param Grade $grade
     * @return mixed
     */
    public function edit(Request $request,Grade $grade)
    {
        $grade = $grade->findOrFail($request->id);

        return view('admin.grade.edit',[
            'grade' => $grade
        ]);
    }

    /**
     * 存储年级更改
     * @param Request $request
     * @param Grade $grade
     * @param School $school
     * @param User $user
     * @return mixed
     */
    public function store(Request $request,Grade $grade,School $school,User $user)
    {
        DB::beginTransaction();

        try
        {
            $school = $school->findOrFail($this->user->school->id);

            $this->validate($request,[
                'name' => 'required',
            ]);

            if($request->id)
            {
                $grade = $grade->findOrFail($request->id);
            }
            else
            {
                $this->validate($request,[
                    'user_name' => 'required',
                    'email'  => 'required|email',
                    'password' => 'required'
                ]);

                $user->name = $request->user_name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                $user->attachRole(5);
                $grade->user_id = $user->id;
            }

            $grade->name = $request->name;
            $grade->school_id = $school->id;
            $grade->save();

            DB::commit();

            return redirect('/admin/grade')->with('status',[
                'code' => 'success',
                'msg'  => '保存成功'
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '保存成功'.$e->getMessage()
            ]);
        }
    }
}