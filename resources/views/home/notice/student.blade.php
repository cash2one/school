<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>身份选择</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="invited in_bind">
    <div class="student">
        <div class="in_mind"><span>以下账号需要续费才能继续使用！</span></div>
        @foreach($students as $student)
            <div class="student_list">
                <div class="student_poto"><img src="/images/face.png" /></div>
                <div class="student_msg">
                    <h3>姓名：<span>{{ $student->name }}</span></h3>
                    <p>学校：{{ $student->school->name }}</p>
                    <p>班级：{{ $student->grade->name }}{{ $student->classes->name }}</p>
                </div>
                <div class="student_link"><a href="{{ url('/order/buy',['id' => $student->id]) }}">去续费</a></div>
            </div>
        @endforeach
    </div>
</div>
<style>

</style>
</body>
</html>