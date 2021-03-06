<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>作业内容</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <link href="/css/fsgallery.css" rel="stylesheet" type="text/css">
    <script src="/js/jquery.js"></script>
    <script src="/js/fs_forse.js"></script>
</head>
<body>
<div class="warp_bg">
    <div class="task">
        <div class="task_box">
            <div class="task_title"><span class="fl icon"><img src="/images/icon/icon_task.png" /></span>作业内容</div>
            <div class="task_cont">
                {{ $task->detail }}
            </div>
        </div>
        <div class="task_img" id="gallery" >
            <ul>
                @foreach($task->images as $image)
                <li><a href="{{ $image->local_url }}"><img src="{{ $image->local_url }}" /></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</body>
</html>