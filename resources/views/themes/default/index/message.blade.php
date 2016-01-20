@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}">
    <section class="container">

        <div id="check">
            <h4 style="border-bottom:solid 1px blue;">我要留言</h4>
        </div>
        <form id="input_form" class="form-horizontal" action=""  method="POST">
            <input type="hidden" name="uid" value="{{isset($uid)?$uid:-1}}" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、您的姓名</label>
            <div class="col-sm-2">
                    <input id="zq_title" type="text" class="form-control" name="title" value="" />
            </div>
            <div class="col-sm-8 help-block"><span id="error_title"></span></div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>2、内容</label>
            <div class="col-sm-6">
                    <textarea name="content" class="form-control" cols="9" rows="5"></textarea>
            </div>
            <div class="col-sm-4 help-block"><span id="error_content"></span></div>
        </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、联系电话</label>
                <div class="col-sm-2">
                    <input id="zq_contact" type="text" class="form-control" name="contact" value="" />
                </div>
                <div class="col-sm-8 help-block"><span id="error_contact"></span></div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label"></label>
                <div class="col-sm-5">
                    <button class="btn btn-info">提交</button>
                </div>
                <label class="col-sm-6 help-block"><a class="btn" href="{{ URL('/') }}">返回</a></label>
            </div>

        </form>
    </section>
    <script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        var validator;
        $(document).ready(function(){
            validator=$("#input_form").validate({
                submitHandler: function (form) {
                    $.ajax({
                        url: '{{URL('message/save')}}',
                        type: "post",
                        data: $("#input_form").serialize(),
                        success: function(data){
                            alert(data);
                        }
                    });
                },
                rules: {
                    "title":{required:true,maxlength:20},
                    "content":{required:true,maxlength:2000},
                    "contact":{required:true,maxlength:20}
                },
                messages: {
                    "title":{
                        required:"姓名必须填写!",
                        maxlength:"姓名不超过20个字!",
                    },
                    "content":{
                        required:"内容必须填写!",
                        maxlength:"联系方式不超过2000个字!",
                    },
                    "contact":{
                        required:"联系电话必须填写!",
                        maxlength:"联系电话不超过20个字!",
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