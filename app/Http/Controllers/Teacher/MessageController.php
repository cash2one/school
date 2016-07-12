<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 14:42
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Message;

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
}