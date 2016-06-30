<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/30
 * Time: 15:54
 */

namespace App\Http\Controllers\Admin;


use App\Models\Classes;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Exception;

class ClassesController extends AdminController
{
    /**
     * 班级列表
     * @param Classes $classes
     * @return mixed
     */
    public function index(Classes $classes)
    {
        $classes = $classes->where('school_id',$this->user->school->id)->paginate(50);

        return view('admin.classes.index',[
            'classes' => $classes
        ]);
    }

    /**
     * 新增班级
     * @param Grade $grade
     * @return mixed
     */
    public function add(Grade $grade)
    {
        $grades = $grade->where('type_id',$this->user->school->type_id)->get();

        return view('admin.classes.add',[
            'grades' => $grades
        ]);
    }

    /**
     * 班级班级
     * @param Request $request
     * @param Grade $grade
     * @param Classes $classes
     * @return mixed
     */
    public function edit(Request $request,Grade $grade,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        $grades = $grade->where('type_id',$this->user->school->type_id)->get();

        return view('admin.classes.edit',[
            'grades' => $grades,
            'classes' => $classes
        ]);
    }

    /**
     * 存储班级信息
     * @param Request $request
     * @param Classes $classes
     * @param User $user
     * @return mixed
     */
    public function store(Request $request,Classes $classes,User $user)
    {
        DB::beginTransaction();

        try
        {
            if($request->id)
            {
                $classes = $classes->findOrFail($request->id);
            }
            else
            {
                $user->name = $request->user_name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                $user->attachRole(7);
                $classes->user_id = $user->id;
            }

            $classes->name = $request->name;

            $classes->school_id = $this->user->school->id;

            $classes->grade_id = $request->grade;

            $classes->save();

            DB::commit();

            return redirect('/admin/classes')->with('status',[
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