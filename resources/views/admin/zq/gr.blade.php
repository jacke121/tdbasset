@extends('member.zqm')

@section('content')

	<div class="text-center">
		<h3>个人债务宝</h3>
		<p>请认真阅读并填写以下文字：带星号（<span class="text-warning">*</span>）的为必填项；信息填写越完整，将会吸引更多代理方与您联系！</p>
		<ul class="list-inline">
			<li><a href="#zqItem">债权详情</a></li>
			<li><a href="#zqr">债权人详情</a></li>
			<li><a href="#zwr">债务人详情</a></li>
		</ul>
	</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="types" value="1">
@include("admin.zq.iterm.zqItem")
@include("admin.zq.iterm.zqr")
@include("admin.zq.iterm.zwr")

<div class="form-group">
	<label class="col-sm-1 control-label"></label>
	<div class="col-sm-5">
		 <button class="btn btn-info">添加</button>
	</div>
	<label class="col-sm-6 help-block"><a class="btn" href="{{ URL('zqm/') }}">返回</a></label>
</div>

@endsection