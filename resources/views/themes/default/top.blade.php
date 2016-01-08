<style type="text/css">
    .top{ width:100%; height:46px; line-height:46px; background:#EBEBEB;}
    .center{ width:1001px; margin:0 auto;}
    .center .login{ display:inline-block; width:58px; height:26px; line-height:26px; text-align:center; background:#ee8d0a; border-radius:5px; color:#ffffff;}

    .center .login_{ display:inline-block; height:26px; line-height:26px; text-align:center; color:#ee8d0a; margin-right:7px; font-size:14px;}
    .mag{width:20px;height:20px; border-radius: 50%;background: #ed6d00;color: #fff;font-size: 10px; position:absolute;top:-10px;right:-10px;text-align:center;}
    .mag span{position:absolute;top:0px;left:0px;width:20px;line-height:20px; display:inline-block;text-align:center;}

</style>
<div class="top">
    <div class="center">
        <img src="{{ URL::asset('/')}}images/top_phone.jpg" width="16" height="16" style="margin-right:8px;">
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
                        <a href="'/member/index" class="f14" style="margin-right:15px;">个人中心</a>
                        <a href="#"><img src="{{ URL::asset('/')}}images/top_qq.jpg" width="16" height="17" style="margin-right:5px;"></a>
                        <a href="#"><img src="{{ URL::asset('/')}}images/top_weixin.jpg" width="18" height="17"></a>
                    </div>
        @endif
    </div>
</div>

<div class="header">
    <div class="center">
        <ul class="center_left">
            <li style="margin:19px 17px 0 0;"><a href="/"><img src="{{URL::asset('/')}}/images/head_logo.jpg" width="58" height="57"></a></li>
            <li style="margin-top:35px;"><img src="{{URL::asset('/')}}/images/head_ldzc.jpg" width="219" height="25"></li>
        </ul>
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
            <dt><a id="nav_about" href="{{ URL('about/2') }}">关于我们</a></dt>
        </dl>
    </div>
</div>