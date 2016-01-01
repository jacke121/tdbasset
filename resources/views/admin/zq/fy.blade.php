@extends('member.zqm')

@section('content')

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="zq.types" value="2">

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、应履行判决金额</label>
	<div class="col-sm-4">
		<input id="types" type="text" class="form-control" name="zq.zq_quote" value="${(zq.zq_quote)!}" />元
	</div>
	<label class="col-sm-6 help-block"> </label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>2、判决做出时间</label>
	<div class="col-sm-4">
		<input id="types" type="text" class="form-control" name="zq.zq_quote" value="${(zq.zq_quote)!}" />元
	</div>
	<label class="col-sm-6 help-block"></label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、判决作出法院</label>
	<div class="col-sm-4">
		<select class="control-label">
		  <option>aa</option>
		</select>
		<select class="control-label">
		  <option>bb</option>
		</select>
		<select class="control-label">
		  <option>cc</option>
		</select>		
	</div>
	<label class="col-sm-6 help-block"> </label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>4、是否已向法院申请执行</label>
	<div class="col-sm-4">
	<label class="radio-inline"><input type="radio" name="zq.zq_cscs" value="0">已诉讼</label>
	<label class="radio-inline"><input type="radio" name="zq.zq_cscs" value="0">未诉讼</label>
	</div>
	<label class="col-sm-6 help-block"></label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>5、委托催收报酬比例</label>
	<div class="col-sm-4">
		<input id="types" type="text" class="form-control" name="zq.zq_quote" value="${(zq.zq_quote)!}" />
	</div>
	<label class="col-sm-6 help-block"> </label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label"  for="o_address"><span class="required">*</span>6、催收措施</label>
	<div class="col-sm-4">
		<ul class="list-unstyled">
		<li>（1）是否已在法院起诉：<label class="radio-inline"><input type="radio" name="zq.zq_cscs" value="0">已诉讼</label><label class="radio-inline"><input type="radio" name="zq.zq_cscs" value="0">未诉讼</label></li>
		<li>（2）法院是否作出判决：<label class="radio-inline"><input type="radio" name="zq.zq_cscs" value="0">已判决</label><label class="radio-inline"><input type="radio" name="zq.zq_cscs" value="0">未判决</label></li>
		<li>（3）已实地催收<input type="text" class="form-control" name="zq.zq_cscs" value="" />次</li>
		<li>（4）已电话催收<input type="text" class="form-control" name="zq.zq_cscs" value="" />次</li>
		<li>（5）已委托催收<input type="text" class="form-control" name="zq.zq_cscs" value="" />次</li>
	</ul>
	</div>
	<label class="col-sm-6 help-block"></label>
</div>

<div class="form-group">
	<label for="zq_file">7、上传相关凭证</label>
	<input type="file" name="zq.zq_file" value="" />次
	<label class="help-block"><span class="intro">服务承诺:</span> 我们会对您所上传的：合同、协议、借条、欠条、判决书等内容进行严格保密，并对相关身份内容进行模糊处理。以确保您的信息不会外泄。</label>
</div>

<div class="form-group">
	<label for="zq_file">8、债权描述：</label>
	<textarea rows="5" cols="100" name="zq.zq_ms"></textarea>
	<label class="help-block"><span class="intro">服务承诺:</span> 为保护您的隐私，如您在描述中填写个人姓名、 联系方式等信息，平台将做模糊处理</label>
</div>

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