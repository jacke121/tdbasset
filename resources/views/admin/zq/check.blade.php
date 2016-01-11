@extends('member.app')

@section('modules')

<div class="text-center">
    <h3>审核资料</h3>

    <ul class="list-unstyled">
        <li>金额: {{$zq->zq_quote}}</li>
        <li>延期: {{$zq->zq_delay}}</li>
        <li>填写日期: {{$zq->zq_created_at}}</li>
    </ul>

</div>

<form id="input_form" class="form-horizontal" action="{{URL('member/zqm/checkUpdate')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include("admin.zq.iterm.checkItem")

    <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-5">
            <button class="btn btn-info">提交</button>
        </div>
        <label class="col-sm-6 help-block"><a class="btn" href="{{ URL('member/zqm/index') }}">返回</a></label>
    </div>
</form>

<script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">

    jQuery.validator.addMethod("isNumber", function(value, element) {
        return this.optional(element) || /^[-\+]?\d+$/.test(value) || /^[-\+]?\d+(\.\d+)?$/.test(value);
    }, "匹配数值类型，包括整数和浮点数");

    var validator;
    $(document).ready(function(){
        validator=$("#input_form").validate({
            submitHandler:function(form){
                $.ajax({
                    url: '{{URL('member/zqm/checkUpdate')}}',
                    type: "post",
                    data: $("#input_form").serialize(),
                    success: function(data){
                        alert(data);
                        window.location.href = "{{URL('member/zqList/index')}}";
                    }
                });
            },
            rules: {
                "stars":{required:true,digits:true}
            },
            messages: {
                "stars":{
                    required:"推荐指数必须填写!",
                    digits:"只能是整数!",
                }
            },
            errorPlacement: function(error, element){
                var errorId="#error_"+$(element).attr("name");
                $(errorId).html("");
                error.appendTo($(errorId));
            }
        });
    })
</script>

@endsection