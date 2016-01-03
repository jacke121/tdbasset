<div>
	<h4 style="border-bottom:solid 1px blue;">债权方信息</h4>
</div>
<div id="zqr" class="form-group">
	<label for="o_name">
		<span class="required">*</span>1、债权人姓名:
	</label>
	<input id="o_name" type="text" class="form-control" name="o_name" value="" />
	<label class="help-block"><span id="error_o_name" class="error"></span> </label>
</div>

<div class="form-group">
	<label for="o_address">2、债权方地址: </label>
	<ul class="list-inline">
		<li>
			<select class="form-control" name="o_province">
			</select>
		</li>
		<li>
			<select class="form-control" name="o_city">
			</select>
		</li>
		<li>
			<select class="form-control" name="o_contry">
			</select>
		</li>
	</ul>
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="o_phone">3、债权方电话: </label>
	<input id="o_phone" type="text" class="form-control" name="o_phone" value="" />
	<label class="help-block"> <span id="error_o_phone" class="error"></span></label>
</div>

<div class="form-group">
	<label for="o_verify">
		4、债权方证件号：<span class="intro">(债权方营业执照注册号或身份证号)</span>
	</label>
	<input id="o_verify" type="text" class="form-control" name="o_verify" value="" />
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="o_contact">
		<span class="required">*</span>5、债权方联系人姓名:<span class="intro">(与处置方洽谈合作的人)</span>
	</label>
	<input id="o_contact" type="text" class="form-control" name="o_contact" value="" />
	<label class="help-block"><span id="error_o_contact" class="error"></span> </label>
</div>

<div class="form-group">
	<label for="o_cphone">
		<span class="required">*</span>6、债权方联系人电话:<span class="intro">(与处置方洽谈合作的人的电话)</span>
	</label>
	<input id="o_cphone" type="text" class="form-control" name="" value="" />
	<label class="help-block"><span id="error_o_cphone" class="error"></span> </label>
</div>

<script type="text/javascript">
	new PCAS("o_province,请选择省份","o_city,请选择城市","o_contry,请选择地区");
</script>