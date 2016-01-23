<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="_token" content="{{ csrf_token() }}"/>
    <title>找回密码</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}css/retrieve password.css">
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
    function findPwdStep(step) {
        if(step==1){
            sendMessage();
        }
        else if(step==2){

        }
        else if(step==3){
            $(".step3").hide();
            $(".step4").show();
        }
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
            $("#step1").validate({
                errorClass: "error",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    element.after(error);
                },
                rules: {
                    password: {   required: true, rangelength: [6, 16] }

                },
                messages: {
                    password: {
                        required: "请填写密码！",
                        rangelength: "格式：6-16个字符(数字、字母)",
                        remote: "原始密码不正确,请重新填写！" //这个地方如果不写的话，是自带的提示内容，加上就是这个内容。
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
                                $(".step1").hide();
                                $(".step2").show();
                                curCount = count;
                                $("#btnSendCode").html(curCount);//"请在" + curCount + "秒内输入验证码");
                                InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                            }
                        }
                    }
                    $('#step1').ajaxSubmit(ajax_option);
                }
            });
        $("#step2").validate({
            errorClass: "error",
            errorElement: "span",
            errorPlacement: function (error, element) {
                element.after(error);
            },
            rules: {
                checkcode: {   required: true, rangelength: [6, 16] }
            },
            messages: {
                checkcode: {
                    required: "请填写验证码！",
                    rangelength: "验证码格式错误",
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
                            $(".step2").hide();
                            $(".step3").show();
                        }
                    }
                }
                $('#step2').ajaxSubmit(ajax_option);
            }
        });
        $("#step3").validate({
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
                            $(".step3").hide();
                            $(".step4").show();
                            jumpto();
                        }
                    }
                }
                $('#step3').ajaxSubmit(ajax_option);
            }
        });
        var customError = "";
        $.validator.addMethod("checkname", function (value, element) {
            var returnVal = false;
            if(value.length<1){
                returnVal=false;
                customError="用户名不能为空";
            }else {
                $.ajax({
                    type: "POST", //用POST方式传输
                    url: "/auth/checkname", async: false,
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    data: {
                        type: "name", value: value
                    },
                    dataType: "json", //数据格式:JSON
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    },
                    success: function (msg) {
                        if (msg['State'] > 0) {
                            //有异常
                            alert( msg['MsgState']);
                            returnVal = false;
                            customError = msg['MsgState'];
                        } else {
                            $("#mobile2").val(msg['MsgState']);
                            $("#mobile").val(msg['MsgState']);
                            $("#mobile3").val(msg['MsgState']);
                            returnVal = true;
                        }
                    },
                });
            }
            $.validator.messages.checkname = customError;
            return returnVal;
        }, customError);

    });
    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    var currentnum=1;
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
    var InterValObj2; //timer变量，控制时间
    var count2 = 2; //间隔函数，1秒执行
    var curCount2;//当前剩余秒数
    function jumpto() {
        //设置button效果，开始计时
        $("#jumpTo").html(curCount);//"请在" + curCount + "秒内输入验证码");
        InterValObj2 = window.setInterval(SetRemainTime2, 1000); //启动计时器，1秒执行一次
    }
    //timer处理函数
    function SetRemainTime2() {
        if (curCount == 0) {
            window.clearInterval(InterValObj2);//停止计时器
            location.href="/auth/login";
        }
        else {
            curCount--;
            $("#jumpTo").html(curCount);//"请在" + curCount + "秒内输入验证码");
        }
    }
</script>
</head>
<body>
    @include('themes.default.top')
<!--main-->
    <!--广告位-->
    <div class="banner">
        <img src="../images/login_ggt.jpg">
    </div>
    <!--找回密码部分-->
    <div class="repwd">
        <div class="repwdcon">
            <h3 class="repwdtit">找回密码</h3>
            <div class="step1">
                {!! Form::open(['id'=>'step1','url' => '/auth/sendsms', 'method' => 'post','class'=>'form-horizontal']) !!}
                <input type="hidden" name="type" value="forget">
                <input id="mobile" type="hidden" name="mobile" value="3">
                <div class="repwd_step1"></div>
                <div class="int">
                    <span class="intspan">用户名</span>
                    <input type="text" class="checkname" name="name">
                    <span class="ts" style="display: none;">提示提示……</span>
                </div>
                <div class="int">
                    <span class="intspan">验证码</span>
                    <input type="text" class="intspe">
                    <a href="javascript:;" class="code"></a>
                    <span class="ts" style="display: none;">提示提示……</span>
                </div>
                <p class="reg1next">
                    <input type="submit" class="reg2btn" value="下一步">
                </p>
                {!! Form::close() !!}
            </div>
            <div class="step2">
                {!! Form::open(['id'=>'step2','url' => '/auth/checkcode', 'method' => 'post','class'=>'form-horizontal']) !!}
                <input id="mobile2" type="hidden" name="mobile" value="3">
                <div class="repwd_step2"></div>
                <p class="step2p">短信验证码已发送，请注意查收</p>
                <div class="int">
                    <span class="intspan">验证码</span>
                    <input type="text" name="checkcode">
                    <span class="code1"><span id="btnSendCode1" onclick="sendMessage(1)">59s</span></span>
                    <span class="ts" style="display: none;">提示提示……</span>
                </div>
                <p class="step2pts">如果没有收到短信，您可在<span>60s</span>后获取语音验证码</p>
                <p class="reg1next">
                    <input type="submit" class="reg2btn" value="下一步">
                </p><p class="zhao">如您无法使用上述方法找回，请联系客服400-058-9555或重新注册</p>
                {!! Form::close() !!}
            </div>
            <div class="step3">
                {!! Form::open(['id'=>'step3','url' => '/auth/modifypwd', 'method' => 'post','class'=>'form-horizontal']) !!}
                <input id="mobile3" type="hidden" name="mobile" value="3">
                <div class="repwd_step3"></div>
                <div class="int">
                    <span class="intspan">新登录密码</span>
                    <input id="password" type="password" name="password">
                    <span class="ts" style="display: none;">提示提示……</span>
                </div>
                <div class="int">
                    <span class="intspan">确认新登录密码</span>
                    <input type="password" name="confirm_password">
                    <span class="ts" style="display: none;">提示提示……</span>
                </div>
                <p class="reg1next">
                    <input type="submit" class="reg2btn" value="下一步">
                    {{--<a href="javascript:;" onclick="findPwdStep(3)" class="step3btn">确认</a>--}}
                </p>
                {!! Form::close() !!}
            </div>
            <div class="step4">
                <div class="repwd_step4"></div>
                <div class="step4con">
                    <p class="step4con1">设置成功，请牢记新的登录密码</p>
                    <p class="step4con2"><span id="jumpTo">3</span>自动跳转至<a href="/auth/login">登录页</a></p>
                </div>
            </div>
        </div>
    </div>
        <div style="clear:both;"></div>
<!--foot部分-->
	@include('themes.default.foot')
</body>
</html>
