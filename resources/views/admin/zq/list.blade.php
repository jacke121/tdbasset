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
                    <a>修改</a>
                    <a>删除</a>
                </td>

            </tr>
        @endforeach
    </table>

    <div class="pull-right">
        {!! $zqList->render() !!}
    </div>
</div>

@endsection