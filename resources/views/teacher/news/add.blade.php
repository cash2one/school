<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>发布通知</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="warp_bg">
    <form method="post" action="{{ url('/teacher/news/add') }}">
        {!! csrf_field() !!}
        <div class="cover_box">
            <div class="text_cont"><input type="text" name="name" placeholder="通知标题" /></div>
        </div>
        <div class="cover_box">
            <div class="text_cont"><textarea name="detail" placeholder="通知内容"></textarea></div>
        </div>
        <div class="select_grade">
            <p class="title">选择班级：</p>
            <ul>
                @foreach($courses as $course)
                    <li data-id="{{ $course->id }}">
                        <img src="/images/icon/icon_select_now.png" />
                        <p>
                            <i>{{ $course->grade->name }}{{ $course->classes->name }}</i>
                            <span>{{ $course->name }}</span>
                        </p>
                    </li>
                @endforeach
            </ul>
            <p class="clear"></p>
        </div>
        <div class="edit_btn"><input class="fr sure_btn" type="submit" value="发布" /></div>
        <script type="text/javascript">
            $(".select_grade li").click(function(){
                $(this).toggleClass("now");

                if($(this).hasClass('now'))
                {
                    var input = $("<input name='course_id[]' type='hidden'>");

                    input.val($(this).attr('data-id'));

                    $(this).append(input);
                }
                else
                {
                    $(this).find('input').remove();
                }
            })
        </script>
    </form>
</div>
@include('layout.footer')

<script>
    $(function(){

        $(".select_grade ul li").first().click();

    });
</script>
</body>
</html>