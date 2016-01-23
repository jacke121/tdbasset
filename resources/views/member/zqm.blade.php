@extends('member.app')
@section('modules')
    <script src="{{ asset('/js/PCASClass.js') }}"></script>
                    <form id="input_form" enctype="multipart/form-data"  class="form-horizontal" @if(isset($zq)) action="{{URL('member/zqm/update')}}" @else action="{{URL('member/zqm/store')}}" @endif method="POST">
                        @if(isset($zq)) <input type="hidden" name="id" value="{{$zq->id}}"> @endif
                        @yield('content')
                    </form>

    <script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/plugin/swfupload/swfupload.js') }}"></script>
    <script src="{{ asset('/plugin/swfupload/swfupload.queue.js') }}"></script>
    <script src="{{ asset('/plugin/swfupload/fileprogress.js') }}"></script>
    <script src="{{ asset('/plugin/swfupload/handlers.js') }}"></script>

    <script type="text/javascript">

        var swfu;
        window.onload = function() {
            var settings = {
                flash_url : "{{ asset('/plugin/swfupload/swfupload.swf') }}",
                upload_url: "/member/authe/uploadfile",
                post_params: {"_token" : "{{ csrf_token() }}"},
                file_size_limit : "100 MB",
                file_types : "*.*",
                file_types_description : "All Files",
                file_upload_limit : 100,
                file_queue_limit : 0,
                custom_settings : {
                    progressTarget : "fsUploadProgress",
                    cancelButtonId : "btnCancel"
                },
                debug: true,
                // Button settings
                button_image_url: "{{ asset('/plugin/swfupload/color_img.png')}}",
                button_width: "65",
                button_height: "29",
                button_placeholder_id: "spanButtonPlaceHolder",
                button_text: '<span class="theFont">Hello</span>',
                button_text_style: ".theFont { font-size: 16; }",
                button_text_left_padding: 12,
                button_text_top_padding: 3,

                // The event handler functions are defined in handlers.js
                file_queued_handler : fileQueued,
                file_queue_error_handler : fileQueueError,
                file_dialog_complete_handler : fileDialogComplete,
                upload_start_handler : uploadStart,
                upload_progress_handler : uploadProgress,
                upload_error_handler : uploadError,
                upload_success_handler : uploadSuccess,
                upload_complete_handler : uploadComplete,
                queue_complete_handler : queueComplete	// Queue plugin event
            };
            swfu = new SWFUpload(settings);
        };

        jQuery.validator.addMethod("isNumber", function(value, element) {
            return this.optional(element) || /^[-\+]?\d+$/.test(value) || /^[-\+]?\d+(\.\d+)?$/.test(value);
        }, "匹配数值类型，包括整数和浮点数");

        var validator;
        $(document).ready(function(){
            validator=$("#input_form").validate({
                rules: {
                    "zq_quote":{required:true,isNumber:true},
                    "zq_delay":{required:true,digits:true},
                    "o_name":{required:true,maxlength:20},
                    "o_contact":{required:true,maxlength:20},
                    "o_cphone":{required:true,maxlength:20},
                    "d_name":{required:true,maxlength:20}
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
                        maxlength:"债权人姓名不超过20个字!",
                    },
                    "o_contact":{
                        required:"债权人联系人必须填写!",
                        maxlength:"债权人联系人不超过20个字!",
                    },
                   "o_cphone":{
                        required:"债权人联系人电话必须填写!",
                       maxlength:"债权人联系人电话不超过20个字!",
                   },
                    "d_name":{
                        required:"债务人姓名必须填写!",
                        maxlength:"债务人姓名电话不超过20个字!",
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