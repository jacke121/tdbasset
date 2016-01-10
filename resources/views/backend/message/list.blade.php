@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">留言管理</div>

            <div class="panel-body">

                <table class="table table-hover table-top">
                    <tr>
                        <th>#序号</th>
                        <th>标题</th>
                        <th>内容</th>
                        <th>创建时间</th>
                        <th class="text-right">操作</th>
                    </tr>

                    @foreach(messageList as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->title }}</td>
                            <td>{{ $v->content }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">
                                <a>删除</a>
                            </td>

                        </tr>
                    @endforeach
                </table>

            </div>
            {!! $messageList->render() !!}
        </div>

    </div>
@endsection
