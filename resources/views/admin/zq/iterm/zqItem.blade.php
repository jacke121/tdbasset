<div>
<h4 style="border-bottom:solid 1px blue;">债权详情</h4>
</div>

<div id="zqItem" class="form-group">
	<label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、债权金额</label>
	<div class="col-sm-2">
		<div class="input-group">
		<input id="zq_quote" type="text" class="form-control" name="zq.zq_quote" value="" />
		<div class="input-group-addon">元</div>
		</div>
	</div>
	<div class="col-sm-8 help-block">（债务总额加利息，限1万元以上）<span id="error_zq_quote"></span> </div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label"  for="o_address"><span class="required">*</span>2、期望处置方式及回报：(可多选)</label>
	<div class="col-sm-6">
	<ul class="list-unstyled inline-line">
		<li>
			<label class="checkbox-inline"><input type="checkbox" name="zq.zq_czfs" value="0">诉讼催收 报酬比例</label>
			<div class="input-group">
				<input type="text" class="form-control" style="width:200px;" name="zq.zq_czfs_rate" value="" />
				<div class="input-group-addon">% </div>
			</div>
			<span class="append-info">支付代理方报酬</span>
			<div class="clearfix"></div>
		</li>
		<li>
			<label class="checkbox-inline"><input type="checkbox" name="zq.zq_czfs" value="0">非诉催收 报酬比例</label>
			<div class="input-group">
				<input type="text" class="form-control" style="width:200px;" name="zq.zq_czfs_rate" value="" />
				<div class="input-group-addon">% </div>
			</div>
			<span class="append-info">支付代理方报酬</span>
			<div class="clearfix"></div>
		</li>
		<li>
			<label class="checkbox-inline"><input type="checkbox" name="zq.zq_czfs" value="0">债权转让 折扣比率</label>
			<div class="input-group">
				<input type="text" class="form-control" style="width:200px;" name="zq.zq_czfs_rate" value="" />
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
		<input id="types" type="text" class="form-control" name="zq.zq_delay" value="" />
			<div class="input-group-addon">天 </div>
		</div>
	</div>
	<div class="col-sm-6 help-block"><span id="error_zq_delay"></span></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>2、担保方式：(可多选)</label>
	<div class="col-sm-6">
	<ul class="list-inline">
		<li><label class="checkbox-inline"><input type="checkbox" name="zq.zq_warrant" value="0">他人担保</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq.zq_warrant" value="1">担保公司</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq.zq_warrant" value="2">抵押</label></li>
	</ul>
	<ul class="list-inline">
		<li><label class="checkbox-inline"><input type="checkbox" name="zq.zq_warrant" value="3">质押</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq.zq_warrant" value="4">其他担保</label></li>
		<li><label class="checkbox-inline"><input type="checkbox" name="zq.zq_warrant" value="5">无</label></li>
	</ul>
	</div>
	<div class="col-sm-4 help-block"><span id="error_zq_warrant"></span></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>5、催收措施</label>
	<div class="col-sm-6">
		<ul class="list-unstyled inline-line">
		<li><div class="label-title">（1）是否已在法院起诉：</div><label class="radio-inline"><input type="radio" name="zq.zq_cscs_ss" value="0">已诉讼</label><label class="radio-inline"><input type="radio" name="zq.zq_cscs_ss" value="0">未诉讼</label><div class="clearfix"></div></li>
		<li><div class="label-title">（2）法院是否作出判决：</div><label class="radio-inline"><input type="radio" name="zq.zq_cscs_pj" value="0">已判决</label><label class="radio-inline"><input type="radio" name="zq.zq_cscs_pj" value="0">未判决</label><div class="clearfix"></div></li>
			<li>
				<div class="label-title">（3）已实地催收</div>
				<div class="input-group">
					<input class="form-control" type="text" name="zq.zq_cscs_sd" value="" />
					<div class="input-group-addon">次</div>
				</div>
				<div class="clearfix"></div>
			</li>
			<li>
				<div class="label-title">（4）已电话催收</div>
				<div class="input-group">
					<input class="form-control" type="text" name="zq.zq_cscs_dh" value="" />
					<div class="input-group-addon">次</div>
				</div>
				<div class="clearfix"></div>
			</li>
			<li>
				<div class="label-title">（5）已委托催收</div>
				<div class="input-group">
					<input class="form-control" type="text" name="zq.zq_cscs_wt" value="" />
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
			<input type="file" name="zq.zq_file" value="" />
			<div><span class="text-info">服务承诺:</span> 我们会对您所上传的：合同、协议、借条、欠条、判决书等内容进行严格保密，并对相关身份内容进行模糊处理。以确保您的信息不会外泄。</div>
		</div>
	<div class="col-sm-4 help-block"></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="zq_file">6、债权描述：</label>
	<div class="col-sm-6">
	    <textarea class="form-control" rows="5" name="zq.zq_ms"></textarea>
		<div><span class="text-info">服务承诺:</span> 为保护您的隐私，如您在描述中填写个人姓名、 联系方式等信息，平台将做模糊处理</div>
	</div>
	<div class="col-sm-4 help-block"></div>
</div>
