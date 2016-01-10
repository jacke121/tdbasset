@extends('backend.authe.common')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">企业会员注册认证</div>
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
            {!! Form::model($member, ['url' => ['backend/authe/update', $member->id], 'method' => 'post','class'=>'form-horizontal']) !!}
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-4">
                    {!! Form::text('cate_name', $member->name, ['class' => 'form-control','placeholder'=>'category_name']) !!}
                    <font color="red">{{ $errors->first('cate_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">别名</label>
                <div class="col-sm-4">
                    {!! Form::text('as_name', $member->itemname, ['class' => 'form-control','placeholder'=>'as_name']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo 标题</label>
                <div class="col-sm-4">
                    {!! Form::text('seo_title', $member->mobile, ['class' => 'form-control','placeholder'=>'seo_title']) !!}
                    <font color="red">{{ $errors->first('seo_title') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo 关键字</label>
                <div class="col-sm-4">
                    {!! Form::text('seo_key', $member->cardno, ['class' => 'form-control','placeholder'=>'seo_key']) !!}
                    <font color="red">{{ $errors->first('seo_key') }}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo 描述</label>
                <div class="col-sm-4">
                    {!! Form::textarea('seo_desc',  $member->cardno, ['class' => 'form-control']) !!}
                    <font color="red">{{ $errors->first('seo_desc') }}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">营业执照</label>
                <div class="col-sm-8">
                    <ul id="faceul">
                        @foreach($member->cardnourl as $key=>$img)
                            <li><a href="#"><img src="{{ URL::asset('/')}}{{$img}}" /></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('审批', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection