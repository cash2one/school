<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>发送留言</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <form method="post" action="{{ url('/teacher/task/add') }}">
        {!! csrf_field() !!}
        <div class="cover_box">
            <div class="text_cont">
                <select class="maseg_name">
                    <option>张三</option>
                    <option>李四</option>
                    <option>王五</option>
                </select>
                <textarea class="maseg_textar" name="detail" placeholder="留言内容"></textarea>
            </div>
        </div>
        <div class="cover_btn">
            <input class="fr sure_btn" type="submit" value="发布" />
        </div>
    </form>
</div>
</body>
</html>