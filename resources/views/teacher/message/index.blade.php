<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>我的留言</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <div class="notice_type">
        <!--
        <p class="remark_edit fr">编辑</p><p class="remark_close fr">完成</p>
        -->
        <ul>
            <li @if($type == 1)class="cur"@endif><a href="{{ url('/teacher/message') }}">全部</a></li>
            <li @if($type == 2)class="cur"@endif><a href="{{ url('/teacher/message/unread') }}">未读</a></li>
            <li @if($type == 3)class="cur"@endif><a href="{{ url('/teacher/message/read') }}">已读</a></li>
        </ul>
    </div>
    <div class="remark">
        <ul>
            @foreach($messages as $message)
            <li @if(!$message->looked) class="read" @endif>
                <a href="{{ url('/teacher/message/detail',['id' => $message->id]) }}">
                <p class="check_box"><span></span></p>
                <div class="remark_men fl"><img src="/images/face.png" /></div>
                <div class="remark_main">
                    <h3>{{ $message->postUser->name }}</h3>
                    <p>{{ $message->detail }}</p>
                </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@include('layout.footer')
</body>
</html>