@extends('member.zqm')

@section('content')

	<div class="text-center">
		<h3>判决执行宝</h3>
		<p>请认真阅读并填写以下文字：带星号（<span class="text-warning">*</span>）的为必填项；信息填写越完整，将会吸引更多代理方与您联系！</p>
		<ul class="list-inline">
			<li><a href="#zqItem">债权详情</a></li>
			<li><a href="#zqr">债权人详情</a></li>
			<li><a href="#zwr">债务人详情</a></li>
		</ul>
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="types" value="3">

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、应履行判决金额</label>
	<div class="col-sm-4">
		<div class="input-group">
			<input id="zq_quote" type="text" class="form-control" name="zq_quote" value="" />
			<div class="input-group-addon">元</div>
		</div>
	</div>
	<label class="col-sm-6 help-block"> </label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>2、判决做出时间</label>
	<div class="col-sm-4">
		<div class="input-group">
			<input id="types" type="text" class="form-control" name="zq_delay" value="" />
			<div class="input-group-addon">天 </div>
		</div>
	</div>
	<label class="col-sm-6 help-block"></label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、判决作出法院</label>
	<div class="col-sm-8">
		<ul class="list-inline">
			<li>
				<select class="form-control" name="p_province">
				</select>
			</li>
			<li>
				<select class="form-control" name="p_city">
				</select>
			</li>
			<li>
				<select class="form-control" name="p_contry">
				</select>
			</li>
		</ul>
	</div>
	<label class="col-sm-2 help-block"> </label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>4、是否已向法院申请执行</label>
	<div class="col-sm-4">
	<label class="radio-inline"><input type="radio" name="zq_cscs" value="0">已诉讼</label>
	<label class="radio-inline"><input type="radio" name="zq_cscs" value="0">未诉讼</label>
	</div>
	<label class="col-sm-6 help-block"></label>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>5、委托催收报酬比例</label>
	<div class="col-sm-4">
		<div class="input-group">
			<input id="zq_czfs_sscs_rate" type="text" class="form-control" name="zq_czfs_sscs_rate" value="" />
			<div class="input-group-addon">%</div>
		</div>
	</div>
	<label class="col-sm-6 help-block"> </label>
</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>6、催收措施</label>
		<div class="col-sm-6">
			<ul class="list-unstyled inline-line">
				<li><div class="label-title">（1）是否已在法院起诉：</div><label class="radio-inline"><input type="radio" name="zq_cscs_ss" value="0">已诉讼</label><label class="radio-inline"><input type="radio" name="zq_cscs_ss" value="0">未诉讼</label><div class="clearfix"></div></li>
				<li><div class="label-title">（2）法院是否作出判决：</div><label class="radio-inline"><input type="radio" name="zq_cscs_pj" value="0">已判决</label><label class="radio-inline"><input type="radio" name="zq_cscs_pj" value="0">未判决</label><div class="clearfix"></div></li>
				<li>
					<div class="label-title">（3）已实地催收</div>
					<div class="input-group">
						<input class="form-control" type="text" name="zq_cscs_sd" value="" />
						<div class="input-group-addon">次</div>
					</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="label-title">（4）已电话催收</div>
					<div class="input-group">
						<input class="form-control" type="text" name="zq_cscs_dh" value="" />
						<div class="input-group-addon">次</div>
					</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="label-title">（5）已委托催收</div>
					<div class="input-group">
						<input class="form-control" type="text" name="zq_cscs_wt" value="" />
						<div class="input-group-addon">次</div>
					</div>
					<div class="clearfix"></div>
				</li>
			</ul>
		</div>
		<div class="col-sm-4 help-block"><span id="error_zq_cscs"></span></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="zq_file">7、上传相关凭证</label>
		<div class="col-sm-6">
			<input type="file" name="zq_file" value="" />
			<div><span class="text-info">服务承诺:</span> 我们会对您所上传的：合同、协议、借条、欠条、判决书等内容进行严格保密，并对相关身份内容进行模糊处理。以确保您的信息不会外泄。</div>
		</div>
		<div class="col-sm-4 help-block"></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="zq_file">8、债权描述：</label>
		<div class="col-sm-6">
			<textarea class="form-control" rows="5" name="zq_ms"></textarea>
			<div><span class="text-info">服务承诺:</span> 为保护您的隐私，如您在描述中填写个人姓名、 联系方式等信息，平台将做模糊处理</div>
		</div>
		<div class="col-sm-4 help-block"></div>
	</div>


	@include("admin.zq.iterm.zqr")
	@include("admin.zq.iterm.zwr")

	<div class="form-group">
		<label class="col-sm-1 control-label"></label>
		<div class="col-sm-5">
			<button class="btn btn-info">提交</button>
		</div>
		<label class="col-sm-6 help-block"><a class="btn" href="{{ URL('zqm/index') }}">返回</a></label>
	</div>
	<script type="text/javascript">
		new PCAS("p_province,请选择省份","p_city,请选择城市","p_contry,请选择地区");
	</script>
@endsection