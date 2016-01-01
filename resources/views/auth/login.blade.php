<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/index.js"></script>
<script type="text/javascript">

var InterValObj; //timer变量，控制时间
var count = 15; //间隔函数，1秒执行
var curCount;//当前剩余秒数

function sendMessage() {
  　curCount = count;
　　//设置button效果，开始计时
     $("#btnSendCode").attr("disabled", "true");
     $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
var code="122345";
var url="/auth/sendsms";
     $.ajax({
    type: "POST", //用POST方式传输
    url: url, //目标地址
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
      data:{type_data:"register",mobile:$("#mobile").val(),msg:code
    },
     　　dataType: "json", //数据格式:JSON
    　　 error: function (XMLHttpRequest, textStatus, errorThrown) {
    alert(errorThrown);
    },
     　　success: function (msg){
        if(msg['State']>0){
        //有异常
        alert(msg['MsgState']);
        curCount=0;
        }else{
        }
     },
     });
}
</script>
</head>
<body>
       @include('themes.default.top')
<!--top部分-->
<!--广告位-->
	<div class="banner">
    	<img src="{{ asset('/images/login_ggt.jpg') }}"/>
    </div>
<!--登录-->
    <div class="log">
        <div class="logcon">
            <h3 class="logtit">会员登录</h3>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
            <div class="fl logl">
                <p class="logp">请仔细填写下列信息</p>
                <div class="int">
                    <span class="intface userface"></span>
                    <input type="text" placeholder="用户名" class="user" id="account" name="name" value="{{ old('name') }}">
                </div>
                <div class="int">
                    <span class="intface pwdface"></span>
                    <input type="password" placeholder="密码" class="pwd" id="password" name="password">
                </div>
                
                <p class="logtt">
                <input class="log_check" hidden="hidden" type="checkbox" checked="checked"><span hidden="hidden">一周内自动登录</span>
                <a href="#" class="lookpwd">找回密码</a>
                </p>
                <button class="logbtn" type="submit"  id="loginBtn" >登录</button>
            </div>
            </form>
            <div class="fr logr">
                <h3>用户登录帮助</h3>
                <p>如果您在登录前未进行会员注册，请您先进行会员注册；
请您正确填写注册的用户名和密码；如果您忘记了您的密码，可以点击‘忘记密码’找回您注册的密码。</p>
                <a href="{{ url('/member/index') }}">免费注册</a>
            </div>
            <div style="clear:both;"></div>
        </div>
        
    </div>
<!--foot部分-->
     @include('themes.default.foot')
</body>
</html>
