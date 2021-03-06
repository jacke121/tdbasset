@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">留言管理</div>

            <div class="panel-body">
                <meta name="_token" content="{!! csrf_token() !!}"/>
                <table class="table table-hover table-top">
                    <tr>
                        <th>#序号</th>
                        <th>客户姓名</th>
                        <th>内容</th>
                        <th>电话</th>
                        <th>创建时间</th>
                        <th class="text-right">操作</th>
                    </tr>

                    @foreach($messageList as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->title }}</td>
                            <td>{{ $v->content }}</td>
                            <td>{{ $v->contact }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">
                                <a href="javascript:void(0)" onclick="deleteMessage({{$v->id}})">删除</a>
                            </td>

                        </tr>
                    @endforeach
                </table>

            </div>
            {!! $messageList->render() !!}
        </div>

    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        function deleteMessage(params){
            var isDelete = window.confirm("您确定要删除本条记录?删除后不能恢复！");
            if (isDelete) {
                $.ajax({
                    url: '{{url('backend/message/delete')}}',
                    type: "delete",
                    data: {'id': params, '_token': $('input[name=_token]').val()},
                    success: function (data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            }
        }
    </script>
@endsection
