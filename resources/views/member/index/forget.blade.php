<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="_token" content="{{ csrf_token() }}"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
    <style>
        span.error {
            padding-left: 16px;
            color: #E15F63
        }
        span.success {
            background: url("{{ asset('images/checked.gif')}}") no-repeat 0px 0px;
            padding-left: 16px;
        }
    </style>
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{asset('/js/jquery.form.js') }}"></script>
<script src="{{ asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    var currentnum=1;
    function modifypwd() {
        $(".phonecon").hide();
        $(".pwdcon").show();

    }

    function modifymobile(step) {
        if (step == 1) {
            $(".phonecon").show();
        }else if (step == 2) {
            var ajax_option={
                dataType: "json", //数据格式:JSON
                success:function(msg){
                    if(msg['State']>0){
                        alert(msg['MsgState']);
                    }else{
                        $(".phonecon1").hide();
                        $(".phonecon2").show();
                    }
                }
            }
            $('#step2').ajaxSubmit(ajax_option);
        }else if(step == 3) {
            var ajax_option={
                dataType: "json", //数据格式:JSON
                success:function(msg){
                    if(msg['State']>0){
                        alert(msg['MsgState']);
                    }else{
                        $(".phonecon2").hide();
                        $(".phonecon3").show();
                    }
                }
            }
            $('#step3').ajaxSubmit(ajax_option);
        }
    }
    $(function () {
         $(".phonecon").show();
        setindex("cen_security");
            $("#formpwd").validate({
                errorClass: "error",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    element.after(error);
                },
                rules: {
                    password: {   required: true, rangelength: [6, 16] },
                    confirm_password: { required: true, rangelength: [6, 16],equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        required: "请填写密码！",
                        rangelength: "格式：6-16个字符(数字、字母)",
                        remote: "原始密码不正确,请重新填写！" //这个地方如果不写的话，是自带的提示内容，加上就是这个内容。
                    },
                    confirm_password: {
                        required: "请填写确认密码！",
                        rangelength: "格式：6-16个字符(数字、字母)",
                        equalTo: "两次输入密码不一致！"
                    }
                },
                success: function (label) {
                    label.html("<font color='green'>√</font>").addClass("success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    // $(element).html("<font color='green'>√</font>");
                },
                submitHandler: function (form) {
                    var ajax_option={
                        dataType: "json", //数据格式:JSON
                        success:function(msg){
                            if(msg['State']>0){
                                alert(msg['MsgState']);
                            }else{
                                $(".pwdcon1").hide();
                                $(".pwdcon2").show();
                            }
                        }
                    }
                    $('#formpwd').ajaxSubmit(ajax_option);
                }
            });
            var customError = "";
            $.validator.addMethod("oldpassword", function (value, element) {
                var returnVal = false;
                if(value.length<6){
                    returnVal=false;
                    customError="密码不能少于6个字符";
                }else {
                    $.ajax({
                        type: "POST", //用POST方式传输
                        url: "/auth/checkpwd", async: false,
                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                        data: {
                            type_data: "modify", password: $(".oldpassword").val()
                        },
                        dataType: "json", //数据格式:JSON
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        },
                        success: function (msg) {
                            if (msg['State'] > 0) {
                                //有异常
                                returnVal = false;
                                customError = msg['MsgState'];
                            } else {
                                returnVal = true;
                            }
                        },
                    });
                }
                $.validator.messages.oldpassword = customError;
                return returnVal;
            }, customError);

    });
    var InterValObj; //timer变量，控制时间
    var count = 15; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    function sendMessage(num) {
        currentnum=num;
       var mobile=$("#mobile").val();
        if(num==2){
            if($("#mobile").val()==$("#newmobile").val()){
                alert("手机号不能与原手机号相同");
                return;
            }
            mobile=$("#newmobile").val();
        }
        curCount = count;
        //设置button效果，开始计时
            if($('#btnSendCode'+num).hasClass('disabled')) return;
            $('#btnSendCode'+num).addClass('disabled');
            // $("#btnSendCode").attr("disabled", "true");
            $("#btnSendCode").html(curCount);//"请在" + curCount + "秒内输入验证码");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        var code="122345";
        var url="/auth/sendsms";
        $.ajax({
            type: "POST", //用POST方式传输
            url: url, //目标地址
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            data:{type_data:"modify",mobile:mobile,msg:code
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
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode"+currentnum).removeClass('disabled');
            // $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode"+currentnum).html("重新发送验证码");
        }
        else {
            curCount--;
            $("#btnSendCode"+currentnum).html(curCount);//"请在" + curCount + "秒内输入验证码");
        }
    }
</script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        <!-- @include('member.left_nav') -->
<!--安全中心-->
        <div class="mainr">
    <div class="main_anquan">
        <h3 class="main_anquan">忘记密码</h3>
       	<div class="phonecon">
       	<!-- 第一步 -->
       	<div class="phonecon1">
			 <table cellspacing="0" class="tabletit1">
			    <tbody><tr>
			      <td class="tdspe">验证原手机号码</td>
			      <td>验证新手机号码</td>
			      <td>成功</td>
			    </tr>
			  </tbody></table>
			  <img src="{{ asset('/')}}images/anquan1.png">
            {!! Form::open(['id'=>'step2','url' => '/auth/modifymobile', 'method' => 'post','class'=>'form-horizontal']) !!}
            <input type="hidden" name="step" value="2">
			  <div class="int">
                    <span class="intspan">手机号码</span>
                    <input id="mobile" name="mobile" type="text" value="" readonly>
                    <span id="btnSendCode1" onclick="sendMessage(1)" class="code">获取验证码</span>
                    <span class="code1">59s后重新发送</span>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">短信验证码</span>
                    <input name="checkcode" type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="javascript:;" onclick="modifymobile(2)" class="phone1btn">下一步</a>
              </p>
            {!! Form::close() !!}
        </div>
        <!-- 第二步 -->
			  <div class="bgbg">
			  <span class="bgts">温馨提示</span>
<p>1.请填写真实有效的手机号，手机号将作为验证用户身份发重要手段。</p>
<p>2.债工厂会对用户的所有资料进行严格保密。</p>
<p>3.手机认证过程遇到问题，请联系客服 000-111-222</p>
			  </div>
       	</div>
       	<p class="an_list list_spe"><a href="javascript:;" onclick="modifypwd()" class="lista pwdx">修改</a></p>
       	<div class="pwdcon">
            {!! Form::open(['id'=>'formpwd','url' => '/auth/modifypwd', 'method' => 'post','class'=>'form-horizontal']) !!}
       	<!-- 第一步 -->
       	<div class="pwdcon1">
			  <div class="int">
                    <span class="intspan">原登录密码</span>
                    <input type="password" name="oldpassword" class="oldpassword">
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">新登录密码</span>
                    <input id="password" type="password" name="password">
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">再次输入新登录密码</span>
                    <input type="password" name="confirm_password">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                  <button type="submit" class="pwd1btn">修改登录密码</button>
              </p>
        </div>
            {!! Form::close() !!}
        <!-- 第二步 -->
       	<div class="pwdcon2">
			  恭喜您成功修改登录密码！！！
        </div>
      			<div class="bgbg">
			  <span class="bgts">温馨提示</span>
<p>1请牢记您设置的新密码，登录密码可通过密码找回功能找回。</p>
<p>2.邮箱认证过程遇到问题，请联系客服 000-111-222</p>
			  </div>
       	</div>
       	<p class="an_list" style="display: none;"><span class="listtit">邮箱认证：</span>已设置<a href="javascript:void(0);" class="lista emailx">修改</a></p>
       	<div class="emailcon">
       	<!-- 第一步 -->
       	<div class="emailcon1">
			  <div class="int">
                    <span class="intspan">原邮箱地址</span>
                    <input type="text" value="" readonly>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">新邮箱地址</span>
                    <input type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="#" class="emailbtn">发送验证邮件</a>
              </p>
        </div>
      			<div class="bgbg">
			  <span class="bgts">温馨提示</span>
<p>1.请填写真实有效的邮箱地址，您可以通过邮箱进行找回密码等功能。</p>
<p>2.青苔债管家会对用户的所有资料进行严格保密。</p>
<p>3.邮箱认证过程遇到问题，请联系客服 000-111-222</p>
			  </div>
       	</div>
     <!-- 弹出层-->
    <div class="tan" style="display:none;">
        <p class="tants">激活成功！</p>
        <p class="tants1">
        已成功发送验证邮件到您的新邮箱，<br>
    请在24小时内进入新邮箱激活。
         </p><p class="tanp">
         <input type="submit" class="tanbtn" value="确认">
         </p>
    </div>
       	<p class="an_list"><span class="listtit">资格认证：</span>
       			未提交认证申请
        </p>
    </div>
    </div>
        <div style="clear:both;"></div>
</div>

<!--foot部分-->
	@include('themes.default.foot')
</body>
</html>
