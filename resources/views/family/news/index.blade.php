<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>全部通知</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="warp_bg">
    <div class="notice_type">
        <ul>
            <li class="cur"><a href="{{ url('/family/news/student',['id' => $student->id]) }}">通知</a></li>
            <li><a href="{{ url('/family/exam/student',['id' => $student->id]) }}">成绩</a></li>
            <li><a href="{{ url('/family/task/student',['id' => $student->id]) }}">作业</a></li>
            <li><a href="{{ url('/family/activity/student',['id' => $student->id]) }}">活动</a></li>
        </ul>
    </div>
    <div class="notice">
        <ul>
            @foreach($news as $item)
            <li>
                <a href="javascript:void(0);">
                    <div class="notice_img"><img src="/images/face.png" /></div>
                    <div class="notice_cont">
                        <h3>{{ $item->name }}</h3>
                        <p><span class="fl">{{ $item->created_at }}</span>{{ $item->detail }}</p>
                    </div>
                </a>
                <div class="blank_bg">
                    <div class="mark_tip">
                        <div class="mark_tip_men">
                            <i class="close"></i>
                            <div class="tip_men_cont">
                                <h3>{{ $item->name }}</h3>
                            </div>
                        </div>
                        <div class="mark_mgs">
                            <p>{{ $item->detail }}</p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<script>

    $(".notice ul li").click(function(){
        $(this).find('.blank_bg').show();
    });

    $(".close").bind('click',function(){
        $(this).parent().parent().parent().hide();
    });
</script>
</body>
</html>