@extends('member.app')
@section('modules')
    <script src="{{ asset('/js/PCASClass.js') }}"></script>
                    <form id="input_form" class="form-horizontal" action="{{ URL('zqm') }}" method="post">
                     @yield('content')
                    </form>

    <script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        jQuery.validator.addMethod("isNumber", function(value, element) {
            return this.optional(element) || /^[-\+]?\d+$/.test(value) || /^[-\+]?\d+(\.\d+)?$/.test(value);
        }, "匹配数值类型，包括整数和浮点数");

        var validator;
        $(document).ready(function(){
            validator=$("#input_form").validate({
                rules: {
                    "zq_quote":{required:true,isNumber:true},
                    "zq_delay":{required:true,digits:true},
                    "o_name":{required:true,maxLength:20},
                    "o_contact":{required:true,maxLength:20},
                    "":{required:true,maxLength:20},
                    "d_name":{required:true,maxLength:20}
                },
                messages: {
                    "zq_quote":{
                        required:"金额必须填写!",
                        isNumber:"金额只能是整数或小数!",
                    },
                    "zq_delay":{
                        required:"延迟天数必须填写!",
                        isNumber:"延迟天数只能是整数!",
                    },
                    "o_name":{
                        required:"债权人姓名必须填写!",
                        maxLength:"债权人姓名不超过20个字!",
                    },
                    "o_contact":{
                        required:"债权人联系人必须填写!",
                        maxLength:"债权人联系人不超过20个字!",
                    },
                   "o_cphone":{
                        required:"债权人联系人电话必须填写!",
                        maxLength:"债权人联系人电话不超过20个字!",
                   },
                    "d_name":{
                        required:"债务人姓名必须填写!",
                        maxLength:"债务人姓名电话不超过20个字!",
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