@extends('themes.default.layouts')
@section('head')
   
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
@endsection
<script src="{{ asset('/')}}js/jquery-1.11.3.min.js"></script>
<script src="{{asset('/')}}js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{asset('/js/jquery.form.js') }}"></script>

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
				name: {required: "必填", minlength: "不得少于3字符"},
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
				$.ajax({
					type: "POST", //用POST方式传输
					url: $("#loginform").attr("action"), //目标地址
					headers: {'X-CSRF-TOKEN': $('_token').val()},
					data: $('#loginform').serialize(),
					dataType: "json", //数据格式:JSON
					async:false,
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("error:" + errorThrown);
						return null;
					},
					success: function (msg) {
						if (msg['State'] > 0) {
							$("#errormsg").html(msg['MsgState']);
//                                alert(msg['MsgState']);
						} else {
							location.href = "/backend/home";
						}
					}
				});
			}
		});
	});
</script>

  <link rel="stylesheet" type="text/css" href="{{ asset('/')}}css/index.css">
          <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
       @include('themes.default.top')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">后台登录</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ url('/backend/auth/login') }}">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">用户名</label>
							<div class="col-md-6">
								<input type="name" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> 记住我
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">登录</button>

								<a class="btn btn-link" href="{{ url('/backend/password/email') }}">忘记密码?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
