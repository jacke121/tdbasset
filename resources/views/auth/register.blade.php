<!doctype html>
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}"/>
<title>用户注册</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/register.css') }}">

<script src="{{ asset('/js/jquery-1.11.3.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<style>
    span.error {
     padding-left: 16px;
     color: #E15F63
    }
    span.success {
    background:url("{{ asset('images/checked.gif')}}") no-repeat 0px 0px;
    padding-left: 16px;
  }
 </style>
<!-- <script src="{{ asset('/js/register.js') }}"></script> -->
<script type="text/javascript">
$(document).ready(function(){
    $("#formregister").validate({
        errorClass: "error",
        errorElement: "span",
        errorPlacement: function(error, element) { 
            element.after(error);
        },
        rules: { 
           name: { required: true, minlength: 3        },
           password: {
                    required: true,
                    rangelength: [6, 16]
                },
                confirm_password: {
                    required: true,
                    rangelength: [6, 16],
                    equalTo: "#password"
                }
            },
            messages: {
                name: { required: "必填", minlength: $.validator.format("不得少于{0}字符.")},
                password: {
                    required: "请填写密码！",
                    rangelength: "密码需由6-16个字符（数字、字母）组成！",
                    remote: "原始密码不正确,请重新填写！" //这个地方如果不写的话，是自带的提示内容，加上就是这个内容。
                },
                confirm_password: {
                    required: "请填写确认密码！",
                    rangelength: "密码需由6-16个字符（数字、字母）组成！",
                    equalTo: "两次输入密码不一致！"
                }
            },
            // onkeyup: false,　　　　//这个地方要注意，修改去控制器验证的事件。
            // onsubmit: false,
        success: function(label) {
           label.html("<font color='green'>√</font>").addClass("success");
        },
         unhighlight: function(element, errorClass, validClass) {
        // $(element).html("<font color='green'>√</font>");
},
        submitHandler: function(form){
        var url=$("#formregister").attr("action");
     $.ajax({
    type: "POST", //用POST方式传输
    url:$("#formregister").attr("action"), //目标地址
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
      data:$('#formregister').serialize(),
      dataType: "json", //数据格式:JSON
      error: function (XMLHttpRequest, textStatus, errorThrown) {
    alert("error:"+errorThrown);
    return null;
    },
      success: function (msg){
            if(msg['State']>0){
                alert(msg['MsgState']);
            }else{
            alert("注册成功!");
            location.href="/member/index"; 
            }
     }
     });
        }
    });
 $.validator.addMethod("onlyName", function(value, element) { 
  return checkUser("name",value);
            },"用户名已存在!");
 var customError = ""; 
  $.validator.addMethod("onlyMobile", function(value, element) { 
    var returnVal = true; 
    var mobile =value;  //获取手机号
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
          if(mobile.length==0 || mobile.length!=11 ||(!myreg.test(mobile))){ 
            returnVal=false;
           customError="请输入正确的手机格式!";
         }else if(! checkUser("mobile",value)){
           returnVal=false;
           customError="手机号已存在!";
        }
 $.validator.messages.onlyMobile = customError; 
return returnVal; 
},customError);
});

var InterValObj; //timer变量，控制时间
var count = 15; //间隔函数，1秒执行
var curCount;//当前剩余秒数
function sendMessage() {
   curCount = count;
 //设置button效果，开始计时
if($('#btnSendCode').hasClass('disabled')) return;
  $('#btnSendCode').addClass('disabled');

     // $("#btnSendCode").attr("disabled", "true");
     $("#btnSendCode").html(curCount);//"请在" + curCount + "秒内输入验证码");
InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
var code="122345";
var url="/auth/sendsms";
     $.ajax({
	type: "POST", //用POST方式传输
	url: url, //目标地址
	headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
	  data:{type_data:"register",mobile:$("#mobile").val(),msg:code
	},
     // 　　dataType: "json", //数据格式:JSON
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

var checkUser = function(column,value) {

var returnVal=false;
     $.ajax({
	type: "POST", //用POST方式传输
	url: "/auth/checkuser", //目标地址
	headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
	  data:{type_data:"register",column:column,value:value
	},
                async: false, 
     　　dataType: "json", //数据格式:JSON
    　　 error: function (XMLHttpRequest, textStatus, errorThrown) {
	alert("error:"+errorThrown);
 	},
     　　success: function (msg){
	     	if(msg['State']==0){
                            returnVal= true;
                        }
     }
     });
          return returnVal;
}
//timer处理函数
function SetRemainTime() {
            if (curCount == 0) {
                window.clearInterval(InterValObj);//停止计时器
               $("#btnSendCode").removeClass('disabled');
                // $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").html("重新发送验证码");
            }
            else {
                curCount--;
                $("#btnSendCode").html(curCount);//"请在" + curCount + "秒内输入验证码");
            }
        }
        $(function(){
  //       	  $("#username").blur(function(){
  //       	var username = $('#username').val(); 
	 //        if(username.length==0 ){
	 //        	$("#nameAlt").css({ color: "#E15F63"});
	 //       	$("#nameAlt").html("用户名不能为空");
	 //       	return;
	 //       }
	 //       var column="name";
	 // });
        	 $("#pwdrepeat").blur(function(){
        	var pwdrepeat = $('#pwdrepeat').val();  //获取手机号
	        if(username.length==0 ){
	       	$("#pwdrepeatAlt").css({ color: "#E15F63"});
	       	$("#pwdrepeatAlt").html("密码必须是数字与字母组合");
	       	return;
	       }
	        if(pwdrepeat!=$('#password').val()){
		$("#pwdrepeatAlt").css({ color: "#E15F63"});
	       	$("#pwdrepeatAlt").html("密码必须是数字与字母组合");
	       }else{
	       	$("#pwdrepeatAlt").css({ color: "#008000"});
	       	$("#pwdrepeatAlt").html("密码输入一致");
	       }
	 });
}) ;
</script>
</head>

<body>
<!--top部分-->
       @include('themes.default.top')
<!--广告位-->
	<div class="banner">
    	<img src="../images/register—_gg.jpg">
   	</div>
<!--reg2-->
<form id="formregister" class="form-horizontal" role="form" method="POST" action="/auth/register">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="reg2">
        <div class="reg2con">
            <div class="reg_step2"></div>
            <h3 class="reg2tit">委托方会员</h3>
            <div class="fl">
                <p class="regp">请仔细填写下列信息</p>
                <div class="int">
                    <span class="intface userface"></span>
                    <input type="text"  id="username" name="name" placeholder="用户名：6-24个字符，区分大小写" class="user onlyName" minlength="2" onkeyup="value=value.replace(/^ +| +$/g,'')">
                </div>
                <div class="int">
                    <span class="intface pwdface"></span>
                    <input type="password" id="password" name="password" placeholder="密码：6-24个英文、数字组成" class="password" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"/>
                </div>
                <div class="int">
                    <span class="intface pwd1face"></span>
                    <input id="pwdrepeat" type="password" placeholder="确认密码：重新输入上面填写的密码" name="confirm_password" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" />
                </div>
             <!--    <div class="int">
                     <span class="intface renface1"></span>
                    <input class="ren1" type="text" placeholder="请输入验证码">                    
                    <img class="code" src="../images/randCheckCode.png" alt="看不清刷新" onclick="refreshRankCode()">
                </div> -->
                <div class="int">
                    <span class="intface phoface"></span>
                    <input type="text" id="mobile" name="mobile"  placeholder="手机号码" class="pho onlyMobile">
                     <span class="code"><a id="btnSendCode" href="javascript:;" onclick="sendMessage()">获取验证码</a></span>
                         <span id="mobileAlt" data-info="mobile">
                        
                         </span>
                </div>
                <div class="int">
                    <span class="intface renface"></span>
                    <input type="text" placeholder="手机认证：请填写收到的验证码" name="checkCode" class="ren">
                         @if ($errors->any())
                        <span id="checkcodeAlt" data-info="checkcode" style="color: #E15F63"> {{ $errors->getBag('default')->first('checkCode') }}</span>
                        @endif 
                </div>
                <p class="regtt">
                <input class="reg_check" type="checkbox" checked="checked">我已阅读并同意平台注册协议
                </p>
            </div>
            <div class="fr reg2r">
            <h3> 投贷宝用户服务协议</h3>
            <p>投贷宝（www.toudaibao.com）由润木财富集团北京投贷宝资本管理有限公司注册并负责运营（以下所称的“本网站”包括网站本身和润木财富集团北京投贷宝资本管理有限公司）。本网站提醒您在注册成为本网站用户前请认真阅读本协议，在充分理解各项条款内容后再选择是否接受本协议，用户一经注册或使用本网站服务即视为同意接受本网站的服务并受以下条款的约束。在您同意以下条款并注册后，将有权依据本协议的条款享受本网站的服务，同时有义务接受本协议条款的约束。</p>
一、第一章 本网站使用说明
	<p>1、本网站的注册用户必须是依据中华人民共和国法律规定具有完全民事权利能力和民事行为能力，能够独立承担民事责任的自然人，如果注册用户不符合资格，请勿注册，否则本网站有权随时终止您的注册进程及本网站服务，您应对您的注册行为给本网站带来的全部损失承担赔偿责任，且您的监护人对此应当承担连带责任。</p>
</p>
	<p>2、在使用本网站服务前，用户必须先在本网站完成注册，成为本网站的注册用户（以下简称“用户”）。</p>
            <p>3、在注册和使用本网站服务的所有期间，用户有义务确保个人资料信息的真实、完整且有效，并承诺对个人资料信息及时进行更新。用户所提交的资料和信息包括但不限于电子邮箱、联系电话、通讯地址、个人身份信息、邮政编码、征信信息等。</p>
            <p>4、若本网站经判断认定用户资料存在错误、虚假等嫌疑时，本网站有权终止用户账户，由此产生的任何损失，需用户自己独立承担责任，与本网站无关。在用户向本网站提供的相关信息资料发生变更时，其应当及时向本网站更新相应的信息和资料，如因用户未及时更新信息和资料而导致本网站无法向其提供服务或发生错误，由此产生的一切后果将由用户自己独立承担，与本网站无关。</p>
            <p>5、本网站的协议内容包括但不限于本网站已经发布的或将来可能发布的各类规则。所有规则均是本协议不可分割的一部分，与本协议具有同等的法律效力。本网站有权根据实际需要不时地修改本网站的相关协议，一旦协议内容发生变动，本网站将公布最新的协议内容，请您随时关注本网站，本网站不再单独通知用户。若您在本网站最新协议内容公告变更后继续使用本网站相关服务的，表示您已充分阅读、理解并接受修改后的协议及具体规则内容，您应遵照修改后的协议行使权利和履行义务，若您不同意修改后的协议内容，请停止使用本网站的服务。</p>
第二章 本网站服务内容
            <p>1、本网站的服务内容包括但不限于：根据用户需求发布交易信息、发布债权转让信息、客户服务等，具体服务内容以本网站当时提供的内容为准。</p>
            <p>2、用户承诺其在本网站上按交易流程所确认的状态，将成为本网站进行相关操作的唯一依据。因用户未能及时对交易状态进行修改、确认而造成的损失由用户自行承担，本网站不承担任何责任。</p>
第三章 用户信息管理
            <p>1、用户同意本网站在业务运营中收集和储存其信息，包括但不限于其自行提供的资料和信息，以及本网站自行收集、取得的其在本网站的交易记录和使用信息等。本网站收集和储存您的用户信息的主要目的在于可以更好的为其提供服务。</p>
            <p>2、用户承诺，本网站可从公开及私人资料中收集用户的额外信息，以更好地了解用户的实际情况，为用户提供更优质的服务。</p>
            <p>3、本网站对于用户提供的或自行收集的用户个人信息享有使用和披露的权利。本网站基于履行协议、提供服务、解决争议、保障交易安全等目的使用用户个人信息资料时，无需告知用户。</p>
            <p>4、本网站有义务根据有关法律要求向公安机关、司法机关等国家机关提供用户的个人资料。</p>
            <p>5、本网站将不定期对用户信息进行抽查、核实以识别问题或解决争议，若发现用户提供信息虚假或有其他疑点，本网站有权对其信息进行披露。</p>
            <p>6、本网站采用行业标准和惯例保护用户的个人信息。本网站不会将用户信息恶意出售或免费共享给任何第三方。但由于技术等方面的限制，本网站无法保证用户的个人信息完全不被泄露。</p>
            <p>7、用户未能按照其与本网站及网站其他用户签订的协议等法律文本的约定履行其义务，则网站有权披露用户个人信息及违约事实。由此给用户造成的任何损失，由用户自行承担，本网站不承担任何责任。</p>
第四章 免责条款
            <p>1、用户应保证，不向其他任何人泄露其在注册时向本网站提交的电子邮箱、用户名、密码及安全问题答案，上述信息是用户在本网站的唯一身份识别信息,请用户妥善保管与自己账户相关的一切信息。如因非本网站原因造成您的账户密码或相关信息泄露的，请应及时通知本网站，以减少可能发生的损失，因上述原因导致的损失需由用户自行承担，与本网站无关。</p>
            <p>2、如用户发现有他人冒用或盗用其账户及密码或进行任何其他未经合法授权行为之情形时，应立即以书面方式通知本网站并请求本网站暂停服务。本网站将积极响应用户的请求，但本网站对已执行的指令及由此导致的损失不承担任何责任。</p>
            <p>3、如果由于本网站及相关第三方的设备、系统故障或缺陷、病毒、黑客攻击、网络故障、网络中断、地震、台风、水灾、海啸、雷电、火灾、暴动、罢工、电力中断、经济形势严重恶化、政府管制或其它类似事件，致使本网站未能履行本协议或履行本协议不符合约定，不构成本网站的违约，对于因此导致的损失，本网站不承担任何责任。</p>
        </div>
            <div style="clear:both;"></div>
            <p class="reg2next">
               <button class="reg2btn" type="submit"  id="reg2btn" >提交</button>
            </p>
        </div>
    </div>
    </form>
<!--foot部分-->
     @include('themes.default.foot')
</body>
</html>
