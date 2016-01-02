<div>
	<h4 style="border-bottom:solid 1px blue;">债务方信息</h4>
</div>
<div id="zwr" class="form-group">
	<label for="d_name">
		<span class="required">*</span>1、债务方姓名:
	</label>
	<input id="d_name" type="text" class="form-control" name="d_name" value="" />
	<label class="help-block"><span id="error_d_name" class="error"></span> </label>
</div>

<div class="form-group">
	<label for="d_address"><span class="required">*</span>2、债务方地址: </label>
	<ul class="list-inline">
		<li>
			<select class="form-control" name="d_province">
			</select>
		</li>
		<li>
			<select class="form-control" name="d_city">
			</select>
		</li>
		<li>
			<select class="form-control" name="d_contry">
			</select>
		</li>
	</ul>
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="d_phone">3、债务方电话: </label>
	<ul class="list-unstyled">
		<li>号码（填写多个号码用逗号分开）:<input type="text" class="form-control" name="d_phone" value="" /></li>
	</ul>
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="d_verify">
		4、债务方证件： <span class="intro">(债务方营业执照注册号或身份证号)</span>
	</label>
	<input id="d_verify" type="text" class="form-control" name="d_verify" value="" />
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="o_contact">
		<span class="required">*</span>5、债务人是否能正常联系:
	</label>
	<label class="radio-inline">
		<input type="radio" name="d_isContact" value="" />可联系
	</label>
	<label class="radio-inline">
		<input type="radio" name="d_isContact" value="" />已失联
	</label>
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="o_cphone">
		<span class="required">*</span>6、债务人是否有还款能力
	</label>
	<label class="radio-inline">
		<input type="radio" name="d_isRepay" value="" />有能力
	</label>
	<label class="radio-inline">
		<input type="radio" name="d_isRepay" value="" />没能力
	</label>
	<label class="radio-inline">
		<input type="radio" name="d_isRepay" value="" />不确定
	</label>
	<label class="help-block"> </label>
</div>
<script type="text/javascript">
	new PCAS("d_province,请选择省份","d_city,请选择城市","d_contry,请选择地区");
</script>