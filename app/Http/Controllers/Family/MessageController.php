<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:38
 */

namespace App\Http\Controllers\Family;
use App\Models\Message;
use App\Models\Student;
use Illuminate\Http\Request;

class MessageController extends FamilyController
{
    /**
     * 消息列表
     * @param Message $message
     * @return mixed
     */
    public function index(Message $message)
    {
        $messages = $message->where('to_user_id',$this->user->id)->orderBy('id','desc')->paginate(15);

        return view('family.message.index',[
            'messages' => $messages,
            'type' => 1
        ]);
    }

    /**
     * 消息内容
     * @param Request $request
     * @param Message $message
     * @return mixed
     */
    public function detail(Request $request,Message $message)
    {
        $message = $message->findOrFail($request->id);

        if($message->looked_at == 0)
        {
            $message->looked_at = time();

            $message->save();
        }

        return view('family.message.detail',[
            'message' => $message
        ]);
    }

    /**
     * 已读消息
     * @param Message $message
     * @return mixed
     */
    public function read(Message $message)
    {
        $messages = $message->where('to_user_id',$this->user->id)->where('looked_at','>',0)->paginate(10);

        return view('family.message.index',[
            'messages' => $messages,
            'type' => 3
        ]);
    }

    /**
     * 未读消息
     * @param Message $message
     * @return mixed
     */
    public function unread(Message $message)
    {
        $messages = $message->where('to_user_id',$this->user->id)->where('looked_at',0)->paginate(10);

        return view('family.message.index',[
            'messages' => $messages,
            'type' => 2
        ]);
    }

    /**
     * 发送留言
     * @param Request $request
     * @param Student $student
     * @return mixed
     */
    public function add(Request $request,Student $student)
    {
        $student = $student->findOrFail($request->id);

        return view('family.message.add',[
            'student' => $student
        ]);
    }

    /**
     * 存储留言
     * @param Request $request
     * @param Message $message
     * @return mixed
     */
    public function store(Request $request,Message $message)
    {
        $message->user_id = $this->user->id;

        $message->to_user_id = $request->to_user_id;

        $message->detail = $request->detail;

        if($message->save())
        {
            return redirect('/family')->with('status',[
                'code' => 'success',
                'msg'  => '发送成功'
            ]);
        }

        return redirect()->back()->with('status',[
            'code' => 'error',
            'msg'  => '发送成功'
        ]);
    }
}