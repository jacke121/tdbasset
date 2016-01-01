@extends('member.zqm')

@section('content')

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="types" value="2">
    @include("admin.zq.iterm.zqItem")
    @include("admin.zq.iterm.zqr")
    @include("admin.zq.iterm.zwr")

    <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-5">
            <button class="btn btn-info">添加</button>
        </div>
        <label class="col-sm-6 help-block"><a class="btn" href="{{ URL('zqm/') }}">返回</a></label>
    </div>

@endsection