<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:28
 */

namespace App\Http\Controllers\Home;


use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;

class TeacherController extends HomeController
{
    public function index()
    {
        $teacher = $this->user->teacher;

        return view('home.teacher.index',[
            'teacher' => $teacher
        ]);
    }

    /**
     * 绑定教师界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bind()
    {
        return view('home.teacher.bind');
    }

    /**
     * 绑定老师
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request,User $user,Teacher $teacher)
    {
        DB::beginTransaction();

        try
        {
            $teacher = $teacher->where(['teacher_id' => $request->teacher_id,'mobile' => $request->mobile])->first();

            if($teacher)
            {
                if($this->user->hasRole('parents'))
                {
                    $this->user->attachRole(4);

                    $teacher->user_id = $this->user->id;

                    $teacher->save();
                }
                else
                {
                    $this->user->name = $teacher->name;

                    $teacher->user_id = $this->user->id;

                    $this->user->save();

                    $teacher->save();
                }

                DB::commit();

                return redirect('/teacher')->with('status',[
                    'code' => 'success',
                    'msg'  => '绑定成功'
                ]);
            }

            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'fail',
                'msg'  => '您不具备老师身份'
            ]);
        }
        catch(Exception $exception)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'fail',
                'msg'  => '系统异常错误代码：'.$exception->getCode()
            ]);
        }
    }
}