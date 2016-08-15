<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>访问错误--页面跳转中...</title>
    <script src="/js/jquery-2.1.3.min.js"></script>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="">
        <style type="text/css">
            body {font-family: "微软雅黑"; background: #C2E4E3;}
            a{ text-decoration:none;}
            *{ margin:0; padding:0;}
            a:link {color: #fff; text-decoration: none ;}
            a:visited {color: #fff; text-decoration: none;}
            a:hover {color: #fff; text-decoration: none}
            .container {margin-left: auto; width: 100%; margin-right: auto; text-align: center; margin-top:100px;}
            .container_1 img { margin-top:5%; width:250px; height:120px;}
            .container_2 img { margin-top:-2%; }
            .container_3 img { width:25%; height:7.5%;}
            .container_3 { width:800px; margin:auto; text-align: center;}
            .container_3_1 { color:#6bbaa3; font-size:30px;}
            .container_3_2 { color:#6bbaa3; font-size:16px;}
            @media only screen and (max-width:800px){
                body{ width:100%; margin:0 auto;}
                .container_3 { width:80%; margin:auto 10%;}
                .container { margin-top:50px;}
            }
        </style>
    </head>
    <!--gif图-->
<body>

<div class="container">
    <div class="container_1"><img src="404.png"></div>
    <div class="container_2"><img src="3.22.gif" ></div>
    <div class="container_3"><!--<img src="images/404_1.png" >-->
        <div class="container_3_1"><span>SORRY你要访问的页面弄丢了</span></div>
        <div class="container_3_2"><span>你可以通过以下方式重新访问......</span></div>
    </div>
    <script>
        $(function () {
            location.href='{{ url('/') }}';
        })
    </script>
</div>
</div>
</body>

</html>
