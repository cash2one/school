<div style="width: 100%;height: 5rem;"></div>
<div class="bot_nav">
    <ul>
        <li>
            <a href="@if(session('identity') == 'teacher'){{ url('/teacher') }}@else{{url('/family')}}@endif">
                <i><img src="/images/icon/icon_user_hui.png" /></i>
                <p>我的</p>
            </a>
        </li>
        @if(session('identity') == 'teacher')
            <li>
                <a href="{{ url('/teacher/classes') }}">
                    <i><img src="/images/icon/icon_rk_hui.png" /></i>
                    <p>任课</p>
                </a>
            </li>
        @else
            <li>
                <a href="{{ url('/family/student') }}">
                    <i><img src="/images/icon/icon_child_hui.png" /></i>
                    <p>孩子</p>
                </a>
            </li>
        @endif
        <li>
            <a href="@if(session('identity') == 'teacher'){{ url('/teacher/message') }}@else{{url('/family/message')}}@endif">
                <i><img src="/images/icon/icon_xx_hui.png" /></i>
                <p>消息</p>
            </a>
        </li>
        @if(session('identity') == 'teacher')
            <li>
                <a href="{{ url('/teacher/news') }}">
                    <i><img src="/images/icon/icon_tz_hui.png" /></i>
                    <p>通知</p>
                </a>
            </li>
        @else
            <li>
                <a href="{{ url('/family/news') }}">
                    <i><img src="/images/icon/icon_tz_hui.png" /></i>
                    <p>通知</p>
                </a>
            </li>
        @endif
    </ul>
</div>
@if(Auth::user()->hasRole('teacher') && Auth::user()->hasRole('parents'))
<div class="fix_btn">
    <a href="{{ url('/') }}">身份选择</a>
</div>
    <style>

    </style>
@endif
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