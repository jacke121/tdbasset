@extends('backend.authe.common')
@section('header')
    @parent

<script src="{{ asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        setindex("liauthe");//上面导航菜单
        setmembertype("memberadd");//左边导航菜单
     $("#formregister").validate({
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
                        },
                        confirm_password: {
                            required: true,
                            rangelength: [6, 16],
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        name: {required: "必填", minlength: "不得少于3个字符."},
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
                    success: function (label) {
                        label.html("<font color='green'>√</font>").addClass("success");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        // $(element).html("<font color='green'>√</font>");
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            type: "POST", //用POST方式传输
                            url: $("#formregister").attr("action"), //目标地址
                            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                            data: $('#formregister').serialize(),
                            dataType: "json", //数据格式:JSON
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                alert(errors);
                                console.log(errors);
                                $.each(errors, function(index, value) {
                                    $.gritter.add({
                                        title: 'Error',
                                        text: value
                                    });
                                });
                                alert("error:" + textStatus+errorThrown);
                                return null;
                            },
                            success: function (msg) {
                                if (msg['State'] > 0) {
                                    alert(msg['MsgState']);
                                } else {
                                    alert("新增会员成功!");
                                    location.href = "/backend/authe/noapproveindex";
                                }
                            }
                        });
                    }
                });
                $.validator.addMethod("onlyName", function (value, element) {
                    return checkUser("name", value);
                }, "用户名已存在!");
                var customError = "";
                $.validator.addMethod("onlyMobile", function (value, element) {
                    var returnVal = true;
                    var mobile = value;  //获取手机号
                    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                    if (mobile.length == 0 || mobile.length != 11 || (!myreg.test(mobile))) {
                        returnVal = false;
                        customError = "请输入正确的手机格式!";
                    } else if (!checkUser("mobile", value)) {
                        returnVal = false;
                        customError = "手机号已存在!";
                        if (!$('#btnSendCode').hasClass('disabled')) {
                            $('#btnSendCode').addClass('disabled');
                        }

                    }else if ($('#btnSendCode').hasClass('disabled')) {
                        $("#btnSendCode").removeClass('disabled');
                    }
                    $.validator.messages.onlyMobile = customError;
                    return returnVal;
                }, customError);
            });

    var checkUser = function (column, value) {
        var returnVal = false;
        $.ajax({
            type: "POST", //用POST方式传输
            url: "/auth/checkuser", //目标地址
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            data: {
                type_data: "register", column: column, value: value
            },
            async: false,
            dataType: "json", //数据格式:JSON
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("error:" + errorThrown);
            },
            success: function (msg) {
                if (msg['State'] == 0) {
                    returnVal = true;
                }
            }
        });
        return returnVal;
    }

</script>
    @append
@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">新增会员</div>
        <div class="panel-body">
            <form id="formregister" class="form-horizontal" role="form" method="POST" action="/auth/register">
            <input type="hidden" name="type" value="add">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-4">
                    {!! Form::text('name','', ['class' => 'form-control onlyName','placeholder'=>'用户名']) !!}
                    <font color="red">{{ $errors->first('cate_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
                <div class="col-sm-4">
                    {!! Form::text('mobile','', ['class' => 'form-control onlyMobile','placeholder'=>'手机号']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-4">
                <input type="text" id="password" name="password" placeholder="密码：6-24个英文、数字组成" class="form-control"
                       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"/>
            </div> </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-4">
                <input id="pwdrepeat" type="password" placeholder="确认密码：重新输入上面填写的密码" name="confirm_password" class="form-control"
                       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"/>
            </div> </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit(' 新  增 ', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
           </form>
        </div>
    </div>
</div>
@endsection