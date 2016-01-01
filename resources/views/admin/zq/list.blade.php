@extends('member.zqm')

@section('content')

<div>


    <table class="table table-hover table-top">
        <tr>
            <th>#</th>
            <th>金额</th>
            <th>所属分类</th>
            <th>申请人</th>
            <th>创建时间</th>
            <th class="text-right">操作</th>
        </tr>

        @foreach($zqList as $k=> $v)
            <tr>
                <th scope="row">{{ $v->id }}</th>
                <td>{{ $v->zq_quote }}</td>
                <td>{{ $v->types }}</td>
                <td>{{ $v->uid }}</td>
                <td>{{ $v->created_at }}</td>
                <td class="text-right">

                    {!! Form::open([
                    'route' => array('backend.article.destroy', $v->id),
                    'method' => 'delete',
                    'class'=>'btn_form'
                    ]) !!}

                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        删除
                    </button>

                    {!! Form::close() !!}

                    {!! Form::open([
                        'route' => array('backend.article.edit', $v->id),
                        'method' => 'get',
                        'class'=>'btn_form'
                    ]) !!}

                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        修改
                    </button>
                    {!! Form::close() !!}

                </td>

            </tr>
        @endforeach
    </table>

</div>


@endsection