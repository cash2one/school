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
    <form method="post" action="{{ url('/family/message/add') }}">
        {!! csrf_field() !!}
        <div class="cover_box">
            <div class="text_cont">
                <select class="maseg_name" name="to_user_id">
                    @foreach($student->classes->courses as $course)
                        @if(Auth::user()->id != $course->teacher->user->id)
                            <option value="{{ $course->teacher->user->id }}">{{ $course->teacher->name }}（{{ $course->name }}）</option>
                        @endif
                    @endforeach
                </select>
                <textarea class="maseg_textar" role="6" name="detail" placeholder="留言内容"></textarea>
            </div>
        </div>
        <div class="cover_btn">
            <input class="fr sure_btn maseg_buto" type="submit" value="发布" />
        </div>
    </form>
</div>
<style>
    .maseg_name{ background:none; margin-bottom:1rem;width:100%; border:1px solid #f0f0f0;-moz-border-radius:1rem;-webkit-border-radius:1rem;border-radius:1rem; padding:0 1rem; height:4rem; line-height:4rem;box-sizing:border-box; font-size:1.6rem;}
    .cover_box .text_cont .maseg_textar{box-sizing:border-box;width:100%; border:1px solid #f0f0f0;-moz-border-radius:1rem;-webkit-border-radius:1rem;border-radius:1rem; padding:0 1rem; font-size:1.8rem; padding:1rem;}
    .cover_btn .maseg_buto{ width:100%; float:none; height:5rem; font-size:2rem}

    .cover_btn{ padding:0 1.5rem;}
</style>
@include('layout.footer')
</body>
</html>