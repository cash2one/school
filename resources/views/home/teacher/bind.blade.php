<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>教师绑定</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="frame">
    <div class="bind">
        <form id="bind_teacher" method="post" action="{{ url('/bind/teacher') }}">
            {!! csrf_field() !!}
            <div class="portrait">
                <p class="por_img fillet"><img src="/images/icon/icon_camera.gif" /></p>
            </div>
            <ul class="bind_mgs">
                <li><p><strong><img src="/images/icon/icon_user.png" /></strong><input placeholder="账号" name="email" type="text"/><b></b></p></li>
                <li><p><strong><img src="/images/icon/icon_password.png" /></strong><input placeholder="密码"  name="password" type="password"/><b></b></p></li>
            </ul>
            <p>
                <input class="bind_btn" type="submit" value="登录" />
            </p>
        </form>
    </div>
</div>
@if (session('status'))
    <script>
        noty({
            text: '{{ session('status.msg') }}',
            type: '{{ session('status.code') }}',
            layout: 'center',
            timeout: '1500'
        });
    </script>
@endif
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.validation.min.js"></script>
<script>
    $(document).ready(function(){

        $('#bind_teacher').validate({
            onkeyup: false,
            errorPlacement: function(error, element){
                element.nextAll('b').first().after(error);
            },
            submitHandler:function(form){
                ajaxpost('bind_teacher', '', '', 'onerror');
            },
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: '此项不能为空'
                },
                password: {
                    required: '此项不能为空'
                }
            }
        });
    });
</script>
</body>
</html>