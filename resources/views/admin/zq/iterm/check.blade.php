<div id="check">
    <h4 style="border-bottom:solid 1px blue;">管理员审核</h4>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="o_address"><span class="required">*</span>1、审核状态</label>
    <div class="col-sm-6">
        <label class="radio-inline"><input type="radio" name="status" checked value="1">通过</label>
        <label class="radio-inline"><input type="radio" name="status" checked value="0">拒绝</label>
    </div>
    <div class="col-sm-4 help-block"><span id="error_status"></span></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="types"><span class="required">*</span>2、推荐指数</label>
    <div class="col-sm-2">
        <div class="input-group">
            <input id="zq_quote" type="text" class="form-control" name="stars" value="" />
            <div class="input-group-addon">星级</div>
        </div>
    </div>
    <div class="col-sm-8 help-block"></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="types"><span class="required">*</span>2、延迟时间</label>
    <div class="col-sm-6">
        <label class="radio-inline"><input type="radio" name="delay_scope" checked value="1">半年内</label>
        <label class="radio-inline"><input type="radio" name="delay_scope" value="2">一年内</label>
        <label class="radio-inline"><input type="radio" name="delay_scope" value="3">两年内</label>
        <label class="radio-inline"><input type="radio" name="delay_scope" value="4">两年以上</label>
    </div>
    <div class="col-sm-4 help-block"> </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、债权金额</label>
    <div class="col-sm-6">
        <label class="radio-inline"><input type="radio" name="delay_scope" checked value="1">10万以下</label>
        <label class="radio-inline"><input type="radio" name="delay_scope" value="2">10-100万</label>
        <label class="radio-inline"><input type="radio" name="delay_scope" value="3">100万以上</label>
    </div>
    <div class="col-sm-4 help-block"> </div>
</div>