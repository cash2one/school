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
        if($this->user->hasRole('grades'))
        {
            $conditions['school_id'] = $this->user->grade->school->id;
        }

        if($this->user->hasRole('director'))
        {
            $conditions['user_id'] = $this->user->id;
        }

        $classes = $classes->where('school_id',$this->user->grade->school->id)->paginate(50);

        return view('admin.classes.index',[
            'classes' => $classes
        ]);
    }

    /**
     * 新增班级
     * @return mixed
     */
    public function add()
    {
        return view('admin.classes.add');
    }

    /**
     * 班级班级
     * @param Request $request
     * @param Classes $classes
     * @return mixed
     */
    public function edit(Request $request,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        return view('admin.classes.edit',[
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
            $this->validate($request,[
                'name' => 'required'
            ]);

            if($request->id)
            {
                $classes = $classes->findOrFail($request->id);
            }
            else
            {
                $this->validate($request,[
                    'user_name' => 'required',
                    'email'     => 'required|email',
                    'password'  => 'required'
                ]);

                $user->name = $request->user_name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                $user->attachRole(7);

                $classes->user_id = $user->id;
                $classes->school_id = $this->user->grade->school->id;
                $classes->grade_id = $this->user->grade->id;
            }



            $classes->name = $request->name;

            $classes->save();

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
                'msg'  => '保存失败'.$e->getMessage()
            ]);
        }
    }

    public function detail(Request $request,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        $students = $classes->students()->paginate(20);

        return view('admin.classes.detail',[
            'classes' => $classes,
            'students' => $students
        ]);
    }
}