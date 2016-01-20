@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">

            <div class="panel-heading">债务审核</div>

            <div class="panel-body">

                <div class="text-center">
                    <h3>审核资料</h3>

                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、债权金额</label>
                            <div class="col-sm-2">
                                <input class="form-control" readonly value="{{ (isset($zq) ? $zq->zq_quote:'' ) }}">
                          </div>
                          <div class="col-sm-8 help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>2、延期</label>
                            <div class="col-sm-2">
                                <input class="form-control" readonly value="{{ (isset($zq) ? $zq->zq_delay:'' ) }}">
                            </div>
                            <div class="col-sm-8 help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、填写日期</label>
                            <div class="col-sm-2">
                                <input class="form-control" readonly value="{{ (isset($zq) ? $zq->created_at:'' ) }}">
                            </div>
                            <div class="col-sm-8 help-block"></div>
                        </div>

                   </form>
                </div>

                <form id="input_form" class="form-horizontal" action="{{URL('member/zqm/checkUpdate')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include("admin.zq.iterm.checkItem")

                    <div class="form-group">
                        <label class="col-sm-1 control-label"></label>
                        <div class="col-sm-5">
                            <button class="btn btn-info">提交</button>
                        </div>
                        <label class="col-sm-6 help-block"><a class="btn" href="{{ URL('backend/zq') }}">返回</a></label>
                    </div>
                </form>

            </div>

        </div>

    </div>

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
                        url: '{{URL('backend/zq/checkUpdate')}}',
                        type: "post",
                        data: $("#input_form").serialize(),
                        success: function(data){
                            alert(data);
                            window.location.href = "{{URL('backend/zq')}}";
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