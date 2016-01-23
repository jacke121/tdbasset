<div>
<h4 style="border-bottom:solid 1px blue;">债权详情</h4>
</div>

<div id="zqItem" class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、债权金额</label>
	<div class="col-sm-2">
		<div class="input-group">
			<input id="zq_quote" type="text" class="form-control" name="zq_quote" value="{{(isset($zq) ? $zq->zq_quote:'' )}}" />
			<div class="input-group-addon">元</div>
		</div>
	</div>
	<div class="col-sm-8 help-block">（债务总额加利息，限1万元以上）<span id="error_zq_quote" class="error"></span> </div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label"  for="o_address"><span class="required">*</span>2、期望处置方式及回报：(可多选)</label>
	<div class="col-sm-6">
	<ul class="list-unstyled inline-line">
		<li>
			<label class="checkbox-inline"><input type="checkbox" name="zq_czfs_sscs" {{((isset($zq->zq_czfs_sscs)&&($zq->zq_czfs_sscs==true)) ?'checked':'') }} value="1">诉讼催收 报酬比例</label>
			<div class="input-group">
				<input type="text" class="form-control" style="width:200px;" name="zq_czfs_sscs_rate" value="{{(isset($zq) ?$zq->zq_czfs_sscs_rate:'')}} " />
				<div class="input-group-addon">% </div>
			</div>
			<span class="append-info">支付代理方报酬</span>
			<div class="clearfix"></div>
		</li>
		<li>
			<label class="checkbox-inline"><input type="checkbox" name="zq_czfs_fscs" {{ ((isset($zq->zq_czfs_fscs)&&($zq->zq_czfs_fscs==true))?'checked':'') }}  value="1">非诉催收 报酬比例</label>
			<div class="input-group">
				<input type="text" class="form-control" style="width:200px;" name="zq_czfs_fscs_rate" value="{{(isset($zq) ?$zq->zq_czfs_fscs_rate:'')}}" />
				<div class="input-group-addon">% </div>
			</div>
			<span class="append-info">支付代理方报酬</span>
			<div class="clearfix"></div>
		</li>
		<li>
			<label class="checkbox-inline"><input type="checkbox" name="zq_czfs_zqzr" {{((isset($zq->zq_czfs_zqzr)&&($zq->zq_czfs_zqzr==true))?'checked':'') }}  value="1">债权转让 折扣比率</label>
			<div class="input-group">
				<input type="text" class="form-control" style="width:200px;" name="zq_czfs_zqzr_rate" value="{{(isset($zq) ?$zq->zq_czfs_zqzr_rate:'')}}" />
				<div class="input-group-addon">% </div>
			</div>
			<span class="append-info">几折出售</span>
			<div class="clearfix"></div>
		</li>
	</ul>
		<div> <span class="text-info">提示：</span>如果不填写详细数字，发布成功后“报酬比例、折扣率”显示为“面议”。</div>
	</div>
	<div class=" col-sm-4 help-block"> </div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、逾期时间</label>
	<div class="col-sm-4">
		<div class="input-group">
		<input id="types" type="text" class="form-control" name="zq_delay" value="{{ (isset($zq->zq_delay) ?$zq->zq_delay:'') }}" />
			<div class="input-group-addon">天 </div>
		</div>
	</div>
	<div class="col-sm-6 help-block"><span id="error_zq_delay"></span></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>2、担保方式：(可多选)</label>
	<div class="col-sm-6">
	<ul class="list-inline">
		<li><label class="checkbox-inline"><input type="checkbox" name="zq_warrant[]" {{(isset($zq->zq_warrant)&&in_array(0,explode("_",$zq->zq_warrant)))?'checked':'' }} value="0">他人担保</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq_warrant[]" {{(isset($zq->zq_warrant)&&in_array(1,explode("_",$zq->zq_warrant)))?'checked':'' }} value="1">担保公司</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq_warrant[]" {{(isset($zq->zq_warrant)&&in_array(2,explode("_",$zq->zq_warrant)))?'checked':'' }} value="2">抵押</label></li>
	</ul>
	<ul class="list-inline">
		<li><label class="checkbox-inline"><input type="checkbox" name="zq_warrant[]" {{(isset($zq->zq_warrant)&&in_array(3,explode("_",$zq->zq_warrant)))?'checked':'' }} value="3">质押</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq_warrant[]" {{(isset($zq->zq_warrant)&&in_array(4,explode("_",$zq->zq_warrant)))?'checked':'' }} value="4">其他担保</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq_warrant[]" {{(isset($zq->zq_warrant)&&in_array(5,explode("_",$zq->zq_warrant)))?'checked':'' }} value="5">无</label></li>
	</ul>
	</div>
	<div class="col-sm-4 help-block"><span id="error_zq_warrant"></span></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>5、催收措施</label>
	<div class="col-sm-6">
		<ul class="list-unstyled inline-line">
		<li><div class="label-title">（1）是否已在法院起诉：</div><label class="radio-inline"><input type="radio" name="zq_cscs_ss" {{((isset($zq->zq_cscs_ss))&&($zq->zq_cscs_ss==1)?'checked':'') }} value="0">已诉讼</label><label class="radio-inline"><input type="radio" name="zq_cscs_ss" {{((isset($zq->zq_cscs_ss))&&($zq->zq_cscs_ss==0)?'checked':'') }}  value="0">未诉讼</label><div class="clearfix"></div></li>
		<li><div class="label-title">（2）法院是否作出判决：</div><label class="radio-inline"><input type="radio" name="zq_cscs_pj" {{((isset($zq->zq_cscs_pj))&&($zq->zq_cscs_pj==1)?'checked':'') }} value="0">已判决</label><label class="radio-inline"><input type="radio" name="zq_cscs_pj" {{((isset($zq->zq_cscs_pj))&&($zq->zq_cscs_pj==0)?'checked':'') }}  value="0">未判决</label><div class="clearfix"></div></li>
			<li>
				<div class="label-title">（3）已实地催收</div>
				<div class="input-group">
					<input class="form-control" type="text" name="zq_cscs_sd" value="{{ (isset($zq->zq_cscs_sd) ?$zq->zq_cscs_sd:'') }}" />
					<div class="input-group-addon">次</div>
				</div>
				<div class="clearfix"></div>
			</li>
			<li>
				<div class="label-title">（4）已电话催收</div>
				<div class="input-group">
					<input class="form-control" type="text" name="zq_cscs_dh" value="{{ (isset($zq->zq_cscs_dh) ?$zq->zq_cscs_dh:'') }}" />
					<div class="input-group-addon">次</div>
				</div>
				<div class="clearfix"></div>
			</li>
			<li>
				<div class="label-title">（5）已委托催收</div>
				<div class="input-group">
					<input class="form-control" type="text" name="zq_cscs_wt" value="{{ (isset($zq->zq_cscs_wt) ?$zq->zq_cscs_wt:'') }}" />
					<div class="input-group-addon">次</div>
				</div>
				<div class="clearfix"></div>
			</li>
	</ul>
	</div>
	<div class="col-sm-4 help-block"><span id="error_zq_cscs"></span></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="zq_file">5、上传相关凭证</label>
	    <div class="col-sm-6">
			<input type="file"name="file[]" multiple size="30" value="{{ (isset($zq->zq_file) ?$zq->zq_file:'') }}" />
			<div><span class="text-info">服务承诺:</span> 我们会对您所上传的：合同、协议、借条、欠条、判决书等内容进行严格保密，并对相关身份内容进行模糊处理。以确保您的信息不会外泄。</div>
		</div>
	<div class="col-sm-4 help-block"></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="zq_file">6、债权描述：</label>
	<div class="col-sm-6">
	    <textarea class="form-control" rows="5" name="zq_ms">{{ (isset($zq->zq_ms) ?$zq->zq_ms:'') }}</textarea>
		<div><span class="text-info">服务承诺:</span> 为保护您的隐私，如您在描述中填写个人姓名、 联系方式等信息，平台将做模糊处理</div>
	</div>
	<div class="col-sm-4 help-block"></div>
</div>
