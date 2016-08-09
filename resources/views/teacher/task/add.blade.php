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
    <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<body>
<div class="warp_bg">
    <form method="post" action="{{ url('/teacher/task/add') }}">
        <div class="up_img">
            <ul>
                <li><img src="/images/icon/icon_add.png" /></li>
                <li><img src="/images/icon/icon_add.png" /></li>
                <li><img src="/images/icon/icon_add.png" /></li>
            </ul>
        </div>
        {!! csrf_field() !!}
        <div class="cover_box">
            <div class="text_cont"><textarea name="detail" placeholder="作业内容"></textarea></div>
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
<script>
    wx.config(<?php echo $js->config(array('chooseImage'), true) ?>);

    $(".up_img ul li").bind('click',function(){

        wx.chooseImage({
            count: 1, // 默认9
            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
            success: function (res) {
                var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
            }
        });

    })
</script>
@include('layout.footer')
</body>
</html>