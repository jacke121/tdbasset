<div class="mainl">
    <ul>
        <li id="cen_home" class="tit"><a href="{{ url('member/zqm/center') }}">委托方会员</a></li>
        <li id="cen_home" ><a href="{{ url('member/center/sysinfo') }}">系统消息</a></li>
        <li id="cen_zqm" ><a href="{{ url('member/zqm/index') }}">发布资产信息</a></li>
        <li id="cen_zqList" ><a href="{{ url('member/zqList/index') }}">我发布的信息</a></li>
        <li id="cen_apply"><a href="{{ url('member/center/apply') }}">已申请信息</a></li>
        <li id="cen_collect"><a href="{{ url('member/center/collect') }}">已收藏信息</a></li>

        
        <li id="cen_authenticate"><a href="{{url('member/authenticate/index')}}">资格认证</a></li>
        <li id="cen_security"><a href="{{ url('member/center/security') }}">安全中心</a></li>
        <li><a href="{{ url('/auth/logout') }}">安全退出</a></li>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var path = $.trim(window.location.pathname.split('/')[3]);
        if(path==""){
            path ="home";
        }else if(path=="index"){
            path = $.trim(window.location.pathname.split('/')[2]);
        }if(path=="create"){
            path = "zqm";
        }
        path = "#cen_"+path;
        $(path).addClass("cur");
    });
</script>