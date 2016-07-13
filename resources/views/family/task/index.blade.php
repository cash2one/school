<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>全部考试</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <div class="notice_type">
        <ul>
            <li class="cur"><a href="{{ url('/family/exam/student',['id' => $student->id]) }}">成绩</a></li>
            <li><a href="{{ url('/family/task/student',['id' => $student->id]) }}">作业</a></li>
            <li><a href="{{ url('/family/activity/student',['id' => $student->id]) }}">活动</a></li>
        </ul>
    </div>
    <div class="notice">
        <ul>
            @foreach($exams as $exam)
                <li>
                    <a href="{{ url('/family/exam/detail',['id' => $exam->id,'sid' => $student->id]) }}">
                        <div class="notice_cont">
                            <h3>{{ $exam->name }}</h3>
                            <p><span class="fl">{{ $exam->created_at }}</span>{{ $exam->grade->name }} {{ $exam->classes->name }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>