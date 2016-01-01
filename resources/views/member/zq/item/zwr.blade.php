<div class="form-group">
	<label for="d_name">
		<span class="required">*</span>1、债务方姓名:
	</label>
	<input id="d_name" type="text" class="form-control" name="zq.d_name" value="${(zq.d_name)!}" />
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="d_address">2、债务方地址: </label>
	<input id="d_address" type="text" class="form-control" name="zq.d_address" value="" />
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="d_phone">3、债务方电话: </label>
	<ul class="list-unstyled">
		<li>号码1:<input type="text" class="form-control" name="zq.d_phone" value="" /></li>
		<li>号码2:<input type="text" class="form-control" name="zq.d_phone" value="" /></li>
		<li>号码3:<input type="text" class="form-control" name="zq.d_phone" value="" /></li>
	</ul>
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="d_verify">
		4、债务方证件： <span class="intro">(债务方营业执照注册号或身份证号)</span>
	</label>
	<input id="d_verify" type="text" class="form-control" name="zq.d_verify" value="" />
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="o_contact">
		<span class="required">*</span>5、债务人是否能正常联系:
	</label>
	<label class="radio-inline">
		<input type="radio" name="zq.d_isContact" value="" />可联系
	</label>
	<label class="radio-inline">
		<input type="radio" name="zq.d_isContact" value="" />已失联
	</label>
	<label class="help-block"> </label>
</div>

<div class="form-group">
	<label for="o_cphone">
		<span class="required">*</span>6、债务人是否有还款能力
	</label>
	<label class="radio-inline">
		<input type="radio" name="zq.d_isRepay" value="" />有能力
	</label>
	<label class="radio-inline">
		<input type="radio" name="zq.d_isRepay" value="" />没能力
	</label>
	<label class="radio-inline">
		<input type="radio" name="zq.d_isRepay" value="" />不确定
	</label>
	<label class="help-block"> </label>
</div>