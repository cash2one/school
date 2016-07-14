<div class="bot_nav">
    <ul>
        <li>
            <a href="@if(Auth::user()->hasRole('teacher')){{ url('/teacher') }}@else{{url('/family')}}@endif">
                <i><img src="/images/icon/icon_user.png" /></i>
                <p>我的</p>
            </a>
        </li>
        @if(Auth::user()->hasRole('teacher'))
            <li>
                <a href="{{ url('/teacher/classes') }}">
                    <i><img src="/images/icon/icon_user.png" /></i>
                    <p>任课</p>
                </a>
            </li>
        @else
            <li>
                <a href="{{ url('/family/student') }}">
                    <i><img src="/images/icon/icon_user.png" /></i>
                    <p>孩子</p>
                </a>
            </li>
        @endif
        <li>
            <a href="@if(Auth::user()->hasRole('teacher')){{ url('/teacher/message') }}@else{{url('/family/message')}}@endif">
                <i><img src="/images/icon/icon_user.png" /></i>
                <p>消息</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" onclick="notic()">
                <i><img src="/images/icon/icon_user.png" /></i>
                <p>通知</p>
            </a>
        </li>
    </ul>
</div>
@if(Auth::user()->hasRole('teacher') && Auth::user()->hasRole('parents'))
<div class="fix_btn">
    <a href="{{ url('/') }}">身份选择</a>
</div>
@endif
<style>
    .bot_nav{ height: 4rem; position: fixed; left: 0; bottom: 0; width: 100%; border-top: .1rem solid #ddd; background: #fff; padding: 1rem 0 .5rem;}
    .bot_nav li{ width: 25%; text-align: center;float: left;}
    .bot_nav i{ display: inline-block; width: 2rem; height: 2rem;}
    .bot_nav p{ line-height: 1.6rem; height: 1.6rem;  font-size: 1.4rem; }
    .fix_btn{ position: fixed; bottom: 10rem; right: 0; border-top-left-radius: .5rem;
        border-bottom-left-radius: .5rem; background: rgba(0,172,146,0.7); border: .1rem solid #00AC92; width: 2rem; text-align: center; padding: 1rem .5rem;
        color: #fff; line-height: 1.5rem;font-size: 1.4rem; height: 6rem;}
</style>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.noty.packaged.min.js"></script>
@if (session('status'))
    <script>
        noty({
            text: '{{ session('status.msg') }}',
            type: '{{ session('status.code') }}',
            layout: 'center',
            timeout: '1500'
        });
    </script>
@endif
<script>
    function notic()
    {
        noty({
            text: '通知系统维护中',
            type: 'warning',
            layout: 'center',
            timeout: '1500'
        });
    }
</script>