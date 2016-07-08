<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>发布文章</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <div class="add_cover">
        <p><img src="/images/add_cover.png" /><input type="file" /></p>
    </div>
    <form id="edit_news">
        <div class="cover_box">
            <p><input type="text" name="news_title" placeholder="文章标题" /><b></b></p>
            <div class="text_cont"><textarea placeholder="文章内容"></textarea></div>
        </div>
        <div class="cover_btn">
            <input class="fr sure_btn" type="submit" value="发布" />
            <p>类型:<select><option>校园公告</option><option>班级公告</option><option>通知</option></select></p>
        </div>
    </form>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.validation.min.js"></script>
<script>
    $(document).ready(function(){

        $('#edit_news').validate({
            onkeyup: false,
            errorPlacement: function(error, element){
                element.nextAll('b').first().after(error);
            },
            submitHandler:function(form){
                ajaxpost('edit_news', '', '', 'onerror');
            },
            rules: {
                news_title: {
                    required: true,
                },
            },
            messages: {
                news_title: {
                    required: '此项不能为空',
                },
            }
        });
    });
</script>
</body>
</html>