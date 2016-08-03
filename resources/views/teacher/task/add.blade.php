<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>发布作业</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="warp_bg">
    <form method="post" action="{{ url('/teacher/task/add') }}">
        {!! csrf_field() !!}
        <div class="cover_box">
            <div class="text_cont"><textarea name="detail" placeholder="作业内容"></textarea></div>
        </div>
        <div class="select_grade">
            <p class="title">选择班级：</p>
            <ul>
                <li class="now"><img src="../images/icon/icon_select_now.png" /><p><i>高一（5）班</i><span>语文</span></p></li>
                <li><img src="../images/icon/icon_select_now.png" /><p><i>高一（5）班</i><span>语文</span></p></li>
                <li><img src="../images/icon/icon_select_now.png" /><p><i>高一（3）班</i><span>语文</span></p></li>
            </ul>
            <p class="clear"></p>
        </div>
        <div class="edit_btn"><input class="fr sure_btn" type="submit" value="发布" /></div>
        <script type="text/javascript">
            $(".select_grade li").click(function(){
                $(this).toggleClass("now");
            })
        </script>
    </form>
</div>
@include('layout.footer')
</body>
</html>