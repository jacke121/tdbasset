<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
<title>登录</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
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
<script src="../js/jquery-1.11.3.min.js"></script>
    <script src="{{ asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="../js/index.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#loginform").validate({
                errorClass: "error",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    element.after(error);
                },
                rules: {
                    name: {required: true, minlength: 3},
                    password: {
                        required: true,
                        rangelength: [6, 16]
                    }
                },
                messages: {
                    name: {required: "必填", minlength: $.validator.format("不得少于{0}字符.")},
                    password: {
                        required: "请填写密码！",
                        rangelength: "密码需由6-16个字符（数字、字母）组成！"
                    }
                },
                success: function (label) {
                    label.html("<font color='green'>√</font>").addClass("success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    // $(element).html("<font color='green'>√</font>");
                },
                submitHandler: function (form) {
                    var url = $("#loginform").attr("action");
                    $.ajax({
                        type: "POST", //用POST方式传输
                        url: $("#loginform").attr("action"), //目标地址
                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                        data: $('#loginform').serialize(),
                        dataType: "json", //数据格式:JSON
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("error:" + errorThrown);
                            return null;
                        },
                        success: function (msg) {
                            if (msg['State'] > 0) {
                                $("#errormsg").html(msg['MsgState']);
//                                alert(msg['MsgState']);
                            } else {
                                location.href = "/member/index";
                            }
                        }
                    });
                }
            });
        });
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
            <form id="loginform"class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
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
                    <br />
                    <span id="errormsg" href="#" style="padding-left: 20px; color: #E15F63" ></span>
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
