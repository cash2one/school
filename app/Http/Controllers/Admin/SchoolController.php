<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/13
 * Time: 16:31
 */

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class SchoolController extends AdminController
{
    /**
     * 学校列表
     * @param School $school
     * @return mixed
     */
    public function index(School $school)
    {
        $schools = $school->orderBy('id','desc')->paginate(50);

        return view('admin.school.index',[
            'schools' => $schools
        ]);
    }

    public function add(Type $type)
    {
        $types = $type->get();

        return view('admin.school.add',[
            'types' => $types
        ]);
    }

    /**
     * 保存学校信息
     * @param Request $request
     * @param School $school
     * @param User $user
     * @return mixed
     */
    public function store(Request $request,School $school,User $user)
    {
        DB::beginTransaction();

        try
        {
            if($request->id)
            {
                $school = $school->findOrFail($request->id);
            }
            else
            {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();

                $school->user_id = $user->id;
            }

            $school->name = $request->name;
            $school->type_id = $request->type;

            $school->save();

            DB::commit();

            return redirect('/admin/school')->with('status',[
                'code' => 'success',
                'msg'  => '保存成功！'
            ]);
        }
        catch(\Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '保存失败！'
            ]);
        }
    }

    /**
     * 编辑学校
     * @param Request $request
     * @param School $school
     * @param Type $type
     * @return mixed
     */
    public function edit(Request $request,School $school,Type $type)
    {
        $school = $school->findOrFail($request->id);

        $types = $type->get();

        return view('admin.school.edit',[
            'school' => $school,
            'types' => $types
        ]);
    }

    /**
     * 删除学校
     * @param Request $request
     * @param School $school
     * @return mixed
     */
    public function delete(Request $request,School $school)
    {
        DB::beginTransaction();

        try
        {
            $school = $school->findOrFail($request->id);
            $school->delete();
            $school->classes()->delete();
            //$school->students()->delete();
            //$school->principal()->delete();
            DB::commit();

            return redirect('/admin/school')->with('status',[
                'code' => 'success',
                'msg'  => '删除学校成功！'
            ]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect('/admin/school')->with('status',[
                'code' => 'success',
                'msg'  => '删除学校失败！'.$e->getMessage()
            ]);
        }
    }
}