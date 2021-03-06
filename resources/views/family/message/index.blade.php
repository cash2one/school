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
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/miss.js"></script>
</head>
<body>
<div class="warp_bg">
    <div class="notice_type">
        <ul>
            <li @if($type == 1)class="cur"@endif><a href="{{ url('/family/message') }}">全部</a></li>
            <li @if($type == 2)class="cur"@endif><a href="{{ url('/family/message/unread') }}">未读</a></li>
            <li @if($type == 3)class="cur"@endif><a href="{{ url('/family/message/read') }}">已读</a></li>
        </ul>
    </div>
    @if(count($messages) == 0)
        <div class="grade_none">
            <p class="img"><img src="/images/icon/icon_none.png" /></p>
            <p class="text">暂无消息</p>
        </div>
    @else
    <div class="remark">
        <ul>
            @foreach($messages as $message)
                <li @if(!$message->looked) class="read" @endif>
                    <a href="{{ url('/family/message/detail',['id' => $message->id]) }}">
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
    @endif
</div>
<!--返回顶部-->
<div class="gotop"><a onclick="gotoTop();return false;"><img src="/images/icon/icon_top.png" /></a></div>
<!--返回顶部 end-->
@include('layout.footer')
</body>
</html>