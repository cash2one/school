<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>发起活动</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <div class="add_cover">
        <p><img src="/images/add_cover.png" /><input type="file" /></p>
    </div>
    <form id="edit_active" method="post" action="{{ url('/teacher/activity/add') }}">
        <div class="cover_box">
            <p><input type="text" name="name" placeholder="活动主题" /><b></b></p>
            <p><input type="text" name="start_time" placeholder="活动开始时间" /><b></b></p>
            <p><input type="text" name="end_time" placeholder="活动结束时间" /><b></b></p>
            <div class="text_cont"><textarea name="detail" placeholder="活动简介"></textarea></div>
        </div>
        <div class="cover_btn">
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input class="fr sure_btn" type="submit" value="发布" />
        </div>
    </form>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.validation.min.js"></script>
<script>
    $(document).ready(function(){

        $('#edit_active').validate({
            onkeyup: false,
            errorPlacement: function(error, element){
                element.nextAll('b').first().after(error);
            },
            submitHandler:function(form){
                ajaxpost('edit_active', '', '', 'onerror');
            },
            rules: {
                active_name: {
                    required: true,
                },
                date_start: {
                    required: true,
                },
                date_end: {
                    required: true,
                },
            },
            messages: {
                active_name: {
                    required: '此项不能为空',
                },
                date_start: {
                    required: '此项不能为空',
                },
                date_end: {
                    required: '此项不能为空',
                },
            }
        });
    });
</script>
</body>
</html>