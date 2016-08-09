<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>{{ $news->name }}</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <div class="news_cont">
        <h3>{{ $news->name }}</h3>
        <div class="news_tip">发布时间：{{ $news->created_at }}</div>
        <div class="news_tip"></div>
        {!! $news->detail !!}
    </div>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
</body>
</html>