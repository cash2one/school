<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>家长绑定账号列表</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/miss.js"></script>
</head>
<body>
<div class="warp_bg">

    @if(count($students) == 0)
        <div class="grade_none">
            <p class="img"><img src="/images/icon/icon_none.png" /></p>
            <p class="text">未绑定学生</p>
        </div>
    @else
    <div class="child_list">
        <ul>
            @foreach($students as $student)
            <li>
                <a href="{{ url('/family/student/detail',['id' => $student->id]) }}">
                    <div class="child_img fl"><img src="/images/face.png" /></div>
                    <div class="child_mgs">
                        <h3>{{ $student->name }}</h3>
                        <p>{{ $student->grade->name }} {{ $student->classes->name }}</p>
                    </div>
                    <span class="now_child"><img src="/images/icon/icon_now.png" /></span>
                </a>
            </li>
            @endforeach
            <li class="add_more">
                <a href="{{ url('/student/bind') }}">
                    绑定新学生
                </a>
            </li>
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