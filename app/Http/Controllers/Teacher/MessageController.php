<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 14:42
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends TeacherController
{
    /**
     * 消息列表
     * @param Message $message
     * @return mixed
     */
    public function index(Message $message)
    {
        $messages = $message->where('to_user_id',$this->user->id)->paginate(10);

        return view('teacher.message.index',[
            'messages' => $messages
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

        $message->looked_at = time();

        $message->save();

        return view('teacher.message.detail',[
            'message' => $message
        ]);
    }
}