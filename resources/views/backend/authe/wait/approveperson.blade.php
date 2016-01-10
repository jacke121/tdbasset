@extends('backend.authe.common')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">个人会员注册认证</div>
        @if ($errors->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong>
            {{ $errors->first('error', ':message') }}
            <br />
            请联系开发者！
        </div>
        @endif
        <div class="panel-body">
            {!! Form::model($member, ['url' => ['/backend/authe/approve', $member->id], 'method' => 'post','class'=>'form-horizontal']) !!}
            <input type="hidden" name="id" value="{{ $member->id}}">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-4">
                    {!! Form::text('cate_name', $member->name, ['class' => 'form-control','readonly'=>"true",'placeholder'=>'category_name']) !!}
                    <font color="red">{{ $errors->first('cate_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    {!! Form::text('as_name', $member->itemname, ['class' => 'form-control','readonly'=>"true",'placeholder'=>'as_name']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
                <div class="col-sm-4">
                    {!! Form::text('seo_title', $member->mobile, ['class' => 'form-control','readonly'=>"true",'placeholder'=>'seo_title']) !!}
                    <font color="red">{{ $errors->first('seo_title') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">身份证号</label>
                <div class="col-sm-4">
                    {!! Form::text('seo_key', $member->cardno, ['class' => 'form-control','readonly'=>"true",'placeholder'=>'seo_key']) !!}
                    <font color="red">{{ $errors->first('seo_key') }}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">身份证扫描件</label>
                <div class="col-sm-8">
                    <ul id="faceul">
                        @foreach($member->cardnourl as $key=>$img)
                            <li><a href="#"><img src="{{ URL::asset('/')}}{{$img}}" /></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">审 批</label>
                <div class="col-sm-4">
                    <input type="radio" name="authestatus" value="4" /> 通过&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="authestatus" value="3" /> 不通过<br>
                    <font color="red">{{ $errors->first('seo_desc') }}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">审批备注</label>
                <div class="col-sm-4">
                    {!! Form::textarea('authemsg',  $member->authemsg, ['class' => 'form-control']) !!}
                    <font color="red">{{ $errors->first('seo_desc') }}</font>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit(' 提 交 认 证 ', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection