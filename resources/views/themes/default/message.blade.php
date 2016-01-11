@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
    <section class="container">

        <div id="check">
            <h4 style="border-bottom:solid 1px blue;">发消息</h4>
        </div>
        <form id="input_form" class="form-horizontal" action="{{URL('message/save')}}"  method="POST">

        <div class="form-group">
            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>1、标题</label>
            <div class="col-sm-2">
                    <input id="zq_title" type="text" class="form-control" name="title" value="" />

            </div>
            <div class="col-sm-8 help-block"><span id="error_title"></span></div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="types"><span class="required">*</span>2、内容</label>
            <div class="col-sm-6">
                    <textarea name="content" class="form-control" cols="7"/>
            </div>
            <div class="col-sm-4 help-block"><span id="error_content"></span></div>
        </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="types"><span class="required">*</span>3、联系方式</label>
                <div class="col-sm-2">
                    <input id="zq_contact" type="text" class="form-control" name="contact" value="" />

                </div>
                <div class="col-sm-8 help-block"><span id="error_contact"></span></div>
            </div>

        </form>
    </section>
    <script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var validator;
        $(document).ready(function(){
            validator=$("#input_form").validate({
                rules: {
                    "title":{required:true,maxlength:20},
                    "content":{required:true,maxlength:20},
                },
                messages: {
                    "title":{
                        required:"标题必须填写!",
                        maxlength:"标题不超过20个字!",
                    },
                    "content":{
                        required:"联系方式必须填写!",
                        maxlength:"联系方式不超过20个字!",
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