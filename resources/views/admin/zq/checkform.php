@extends('member.app')

@section('content')

<div class="text-center">
    <h3>审核资料</h3>

    <ul class="list-unstyled">
        <li>金额: ${{zq.zq_quote}}</li>
        <li>延期: ${{zq.zq_delay}}</li>
        <li>填写日期: ${{zq.zq_created_at}}</li>
    </ul>

</div>

<form id="input_form" class="form-horizontal" action="{{URL('member/zqm/update')}}" method="POST">

    @include("admin.zq.iterm.check")

    <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-5">
            <button class="btn btn-info">提交</button>
        </div>
        <label class="col-sm-6 help-block"><a class="btn" href="{{ URL('zqm/index') }}">返回</a></label>
    </div>
</form>
@endsection