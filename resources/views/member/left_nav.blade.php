<div class="mainl">
    <ul id="leftmenu">
        <li id="cen_home" class="tit"><a href="{{ url('member/zqm/center') }}">委托方会员</a></li>
        <li id="cen_info" ><a href="{{ url('member/center/sysinfo') }}">系统消息</a></li>
        @if(isset(Auth::member()->get()->roletype)&&(Auth::member()->get()->authestatus==4)){
         @if(Auth::member()->get()->roletype == 1)
        <li id="cen_zqm" ><a href="{{ url('member/zqm/index') }}">发布资产信息</a></li>
        <li id="cen_zqList" ><a href="{{ url('member/zqList/index') }}">我发布的信息</a></li>
         @else
        <li id="cen_apply"><a href="{{ url('member/center/apply') }}">已申请信息</a></li>
        <li id="cen_collect"><a href="{{ url('member/center/collect') }}">已收藏信息</a></li>
        @endif
        }@endif
        <li id="cen_authenticate"><a href="{{url('member/authe/index')}}">资格认证</a></li>
        <li id="cen_security"><a href="{{ url('member/center/security') }}">安全中心</a></li>
        <li><a href="{{ url('/auth/logout') }}">安全退出</a></li>
    </ul>
</div>

<script type="text/javascript">
function setindex(id) {
 //设置button效果，开始计时
$("#leftmenu").find("li").attr('class','');
     $("#"+id).attr("class", "cur");
}
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