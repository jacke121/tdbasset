@extends('themes.default.layouts')
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="_token" content="{{ csrf_token() }}"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../../css/index.css">
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
function checkUser(column,value) {
var code="122345";
     $.ajax({
	type: "POST", //用POST方式传输
	url: "/auth/checkUser", //目标地址
	headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
	  data:{type_data:"register",column:column,value:value
	},
     　　dataType: "json", //数据格式:JSON
    　　 error: function (XMLHttpRequest, textStatus, errorThrown) {
	alert(errorThrown);
	return null;
 	},
     　　success: function (msg){
	     	if(msg['State']>0){
	     		if(column=="name"){
     html='<p style="display: block;" class="frm_msg fail"><span style="display: inline;color:#E15F63" class="frm_msg_content" for="js_email">用户名已注册</span></p>';
	     	 $("#namediv").html(html);
	     		}else if(column=="email"){
     html='<p style="display: block;" class="frm_msg fail"><span style="display: inline;color:#E15F63" class="frm_msg_content" for="js_email">邮箱已注册</span></p>';
	     	 $("#emaildiv").html(html);
	     		}
	
	     	}else{
	     	 if(column=="name"){
		$("#namediv").html("");
	     		}else if(column=="email"){
 		$("#emaildiv").html("");
	     		}
	     	}
     	return msg;
     },
     });
}
//timer处理函数
function SetRemainTime() {
            if (curCount == 0) {
                window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").val("重新发送验证码");
            }
            else {
                curCount--;
                $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
            }
        }
        $(function(){
        	$("#mobile").blur(function(){
        	  var html='<p style="display: block;" class="frm_msg fail"><span style="display: inline;color:#E15F63" class="frm_msg_content" for="js_email">请输入正确的邮箱地址</span></p>';
        	var mobile = $('#mobile').val();  //获取手机号
   	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	        if(mobile.length==0 || mobile.length!=11 ||(!myreg.test(mobile)))
	       { 
	       } else{
	       	html="";
	       }
	       if(html.length>0){
	       	     $("#mobilediv").html(html);
	       }
	     //   chkreg(); //调用chkreg()函数，判断5个变量是否正确  
	    });
        	  $("#username").blur(function(){
        	  	var msg="用户名不能为空";
        	  var html='<p style="display: block;" class="frm_msg fail"><span style="display: inline;color:#E15F63" class="frm_msg_content" for="js_email">'+msg+'</span></p>';
        	var username = $('#username').val();  //获取手机号
	        if(username.length==0 ){
	       	 $("#namediv").html(html);
	       	return;
	       }
	       var column="name";
	     checkUser(column,username);

	 });
        	     	  $("#email").blur(function(){
        	  	var msg="用户名不能为空";
        	  var html='<p style="display: block;" class="frm_msg fail"><span style="display: inline;color:#E15F63" class="frm_msg_content" for="js_email">'+msg+'</span></p>';
        	var username = $('#email').val();  //获取手机号
	        if(username.length==0 ){
	       	 $("#emaildiv").html(html);
	       	return;
	       }
	       var column="email";
	     checkUser(column,username);

	 });
}) ;
</script>
</head>
  @include('themes.default.top')
      <div class="center">
@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">注册</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/store">
					<input type="hidden" name="type" value="{{$type }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-3 control-label">用户名:</label>
							<div class="col-md-6">
								<input id="username" type="text" class="form-control" name="name" value="{{ old('name') }}" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')"/>
							 <div id="namediv" ></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">手机号:</label>
							<div class="col-md-6">
							 <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}">
							 <div id="mobilediv" ></div>
							</div>
							<input id="btnSendCode" type="button" value="发送验证码" onclick="sendMessage()" /></p>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">邮箱:</label>
							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
								 <div id="emaildiv" ></div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">密码:</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">确认密码:</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									注  册
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> </div>
@endsection
