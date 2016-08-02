<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:28
 */

namespace App\Http\Controllers\Home;


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
    public function save(Request $request,User $user)
    {
        DB::beginTransaction();

        try
        {
            if(Auth::attempt(['email' => $request->email,'password' => bcrypt($request->password)]))
            {
                $user = $user->where(['email' => $request->email])->first();

                if($user->hasRole('teacher'))
                {
                    $user->openid = $this->user->openid;

                    $user->name = $user->teacher->name;

                    $user->save();

                    dd($user);

                    DB::commit();

                    return redirect('/teacher');
                }
                DB::rollBack();

                return back()->with('status',[
                    'code' => 'fail',
                    'msg'  => '您不具备老师身份'
                ]);
            }

            return back()->with('status',[
                'code' => 'fail',
                'msg'  => '账号或密码错误'
            ]);
        }
        catch(Exception $exception)
        {
            DB::rollBack();

            return back()->with('status',[
                'code' => 'fail',
                'msg'  => '系统异常错误代码：'.$exception->getCode()
            ]);
        }
    }
}