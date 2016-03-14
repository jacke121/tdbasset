<link rel="stylesheet" type="text/css" href="{{ URL::asset('/')}}css/index.css">
<div class="top">
    <div class="center">
        <img src="{{ URL::asset('/')}}images/top_phone.png" width="16" height="16" style="margin-right:8px;">
        <span class="f14" style="margin-right:15px;">服务热线：</span>
        <span style="color:#ee8d0a; font-size:21px; margin-right:458px;">400-058-9555</span>
        @if (Auth::member()->get())
            <div style=" float:right;">
                <a href="/member/index" class="login_">{{ Auth::member()->get()->name }}</a>
                <span style="color:#999999; margin-right:5px;">|</span>
                <a href="#" class="login_" style=" color:#999999; position:relative;">消息
                    <div class="mag">
                        <span>0</span>
                    </div>
                </a>
                <span style="color:#999999; margin-right:5px;">|</span>
                <a href="/auth/logout" class="f14" style="margin-right:15px;">退出</a>
            </div>
                @else
                    <div style=" float:right;">
                        <a href="/auth/login" class="login" style="margin-right:10px;">登录</a>
                        <a href="/auth/register/handler" class="login" style="background:#0092D7; margin-right:14px;">注册</a>
                        <a href="/member/index" class="f14" style="margin-right:15px;">个人中心</a>
                        <a href="#"><img src="{{ URL::asset('/')}}images/top_qq.jpg" width="16" height="17" style="margin-right:5px;"></a>
                        <a href="#"><img src="{{ URL::asset('/')}}images/top_weixin.jpg" width="18" height="17"></a>
                    </div>
        @endif
    </div>
</div>

<div class="header">
    <div class="center">
        <div class="center_left">
           <a href="/"><img src="{{URL::asset('/')}}/images/head_logo.gif" width="332" height="53"></a>
        </div>
        <dl class="center_right">
            <dt class="inDex">
                <a id="nav_home" href="{{ URL('/') }}">首页</a></dt>
            <dd></dd>
            <dt><a id="nav_zq" href="{{ URL('zq') }}">债务大厅</a></dt>
            <dd></dd>
            <dt><a id="nav_service" href="{{ URL('service') }}">产品服务</a></dt>
            <dd></dd>
            <dt><a id="nav_users" href="{{ URL('users') }}">用户指南</a></dt>
            <dd></dd>
            <dt><a id="nav_about" href="{{ URL('about?id=1') }}">关于我们</a></dt>
        </dl>
    </div>
</div>