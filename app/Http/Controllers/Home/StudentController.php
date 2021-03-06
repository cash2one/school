<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:19
 */

namespace App\Http\Controllers\Home;


use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Toplan\Sms\SmsManager;
use DB;
use Exception;

class StudentController extends HomeController
{
    public function index()
    {

    }

    public function bind()
    {
        return view('home.student.bind');
    }

    /**
     * 获取验证码
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCode(Request $request,Student $student,SmsManager $manager)
    {
        if(session('endTime') >= time())
        {
            return response()->json([
                'code' => 'error',
                'msg' => '请一分钟后再试'
            ]);
        }

        $student = $student->where([
            'student_id' => $request->student_id,
            'family_mobile' => $request->family_mobile
        ])->first();

        if(!$student)
        {
            return response()->json([
                'code' => 'error',
                'msg' => '找不到学生'
            ]);
        }

        $res = $manager->requestVerifySms($student->family_mobile,60);

        if($res['success'])
        {
            $request->session()->put('endTime',time()+60);

            return response()->json([
                'code' => 'success',
                'msg' => '短信已成功发送'
            ]);
        }

        return response()->json([
            'code' => 'error',
            'msg' => '短信发送失败'
        ]);
    }

    /**
     * 存储绑定信息
     * @param Request $request
     * @param Student $student
     * @param User $user
     * @param Parents $parents
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Student $student,User $user,Parents $parents)
    {
        $student = $student->where([
            'student_id' => $request->student_id,
            'family_mobile' => $request->family_mobile
        ])->first();

        if(!$student)
        {
            return redirect('/student/bind')->with('status',[
                'code' => 'error',
                'msg'  => '找不到相应的学生'
            ]);
        }

        $moblieSms = DB::table('laravel_sms')->where('to',$request->family_mobile)->orderBy('id','desc')->first();

        if((time() - $moblieSms->sent_time) > 3600)
        {
            return redirect('/student/bind')->with('status',[
                'code' => 'error',
                'msg'  => '验证码已过期'
            ]);
        }

        $smsData = json_decode($moblieSms->data,true);

        if($request->check_num != $smsData['code'])
        {
            return redirect('/student/bind')->with('status',[
                'code' => 'error',
                'msg'  => '验证码不正确'
            ]);
        }

        DB::beginTransaction();

        try
        {
            if(!$this->user->hasRole('parents'))
            {
                $parents->name = $request->name;

                $parents->auth_time = time();

                $parents->user_id = $this->user->id;

                $parents->save();
            }
            else
            {
                $parents = $this->user->family;
            }

            DB::table('parent_student')->insert([
                'parent_id' => $parents->id,
                'student_id' => $student->id,
                'bind_time' => time(),
                'end_time' => time() + ($student->school->free_days * 86400),
            ]);

            //若不存在该角色，则添加
            if(!$this->user->hasRole('parents'))
            {
                $this->user->attachRole(6);
            }

            $this->user->name = $request->name;

            $this->user->save();

            DB::commit();

            return redirect('/family')->with('status',[
                'code' => 'success',
                'msg'  => '认证成功'
            ]);

        }
        catch (Exception $e)
        {
            return redirect('/student/bind')->with('status',[
                'code' => 'error',
                'msg'  => '认证失败'.$e->getCode()
            ]);
        }
    }

    /**
     * 绑定学生
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invited(Request $request,Student $student)
    {
        $ids = explode(',',$request->id);

        $students = $student->whereIn('id',$ids)->get();

        return view('home.student.invited',[
            'students' => $students
        ]);
    }

    public function saveInvited(Request $request,Student $student,Parents $parents)
    {
        DB::beginTransaction();

        try
        {
            if(!$this->user->hasRole('parents'))
            {
                $parents->name = $request->name;

                $parents->auth_time = time();

                $parents->user_id = $this->user->id;

                $parents->save();
            }
            else
            {
                $parents = $this->user->family;
            }

            $dataArr = [];

            foreach ($request->students as $key => $item)
            {
                $dataArr[$key]['student_id'] = $item;
                $dataArr[$key]['parent_id'] = $parents->id;
                $dataArr[$key]['bind_time'] = time();
                $dataArr[$key]['end_time'] = time() + ($student->school->free_days * 86400);
            }

            DB::table('parent_student')->insert($dataArr);

            if(!$this->user->hasRole('parents'))
            {
                $this->user->name = $request->name;

                $this->user->save();
            }

            DB::commit();

            return redirect('/family')->with('status',[
                'code' => 'success',
                'msg' => '绑定成功'
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg' => $e->getCode()
            ]);
        }
    }
}