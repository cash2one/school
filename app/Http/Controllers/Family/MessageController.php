<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:38
 */

namespace App\Http\Controllers\Family;


use App\Models\Message;

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
}