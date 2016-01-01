   <div class="top">
        <div class="center">
            <img src="{{ URL::asset('/')}}/images/top_phone.jpg" width="16" height="16" style="margin-right:8px;">
            <span class="f14" style="margin-right:15px;">服务热线：</span>
            <span style="color:#ee8d0a; font-size:21px; margin-right:458px;">400-058-9555</span>
            <a href="/auth/login" class="login" target="_blank" style="margin-right:10px;">登录</a>
            <a href="/auth/register/handler" class="login" target="_blank" style="background:#0092D7; margin-right:14px;">注册</a>
            <a href="{{ url('/member/index') }}" class="f14" target="_blank" style="margin-right:15px;">个人中心</a>
                    <div class="right">
      <ul class="right">
                    @if (Auth::member())
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::member()->get()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">注销</a></li>
                            </ul>
                        </li>
                    @else
                             <a href="{{ url('/auth/logout') }}">未登录</a>
                    @endif
                </ul>
                </div>
<!--             <a href="#"><img src="../images/top_qq.jpg" width="16" height="17" style="margin-right:5px;"></a>
            <a href="#"><img src="../images/top_weixin.jpg" width="18" height="17"></a> -->
        </div>

    </div>
   <div class="header">
      <div class="center">
            <ul class="center_left">
                <li style="margin:19px 17px 0 0;"><a href="index.html"><img src="{{URL::asset('/')}}/images/head_logo.jpg" width="58" height="57"></a></li>
                <li style="margin-top:35px;"><img src="{{URL::asset('/')}}/images/head_ldzc.jpg" width="219" height="25"></li>
            </ul>
            <dl class="center_right">
                <dt class="inDex"><a href="/"  target="_blank" class="current">首页</a></dt>
                <dd></dd>
                <dt><a href="#" target="_blank">债务大厅</a></dt>
                <dd></dd>
                <dt><a href="#">产品服务</a></dt>
                <dd></dd>
                <dt><a href="#">加盟合作</a></dt>
                <dd></dd>
                <dt><a href="#">用户指南</a></dt>
                <dd></dd>
                <dt><a href="#">关于我们</a></dt>
            </dl>
      </div>
    </div>
