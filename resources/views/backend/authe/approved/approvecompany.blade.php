@extends('backend.authe.common')
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
        setmembertype("liapproved");
    });
</script>
@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">企业会员资料</div>
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
                <label for="inputPassword3" class="col-sm-2 control-label">企业名称</label>
                <div class="col-sm-4">
                    {!! Form::text('as_name', $member->itemname, ['class' => 'form-control','placeholder'=>'as_name']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-4">
                    {!! Form::text('seo_title', $member->mobile, ['class' => 'form-control','placeholder'=>'seo_title']) !!}
                    <font color="red">{{ $errors->first('seo_title') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">证件号</label>
                <div class="col-sm-4">
                    {!! Form::text('seo_key', $member->cardno, ['class' => 'form-control','placeholder'=>'seo_key']) !!}
                    <font color="red">{{ $errors->first('seo_key') }}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">法定代表人姓名</label>
                <div class="col-sm-4">
                    {!! Form::textarea('seo_desc',  $member->ownername, ['class' => 'form-control']) !!}
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