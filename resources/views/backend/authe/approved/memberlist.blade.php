<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=gbk">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
	    <style>
        .table-top{
            margin-top: 20px;
        }
        .btn_form{
           float: right;
            margin-right: 5px;
        }
        li.cur a{
            font-weight:bold
        }
    </style>
    <script type="text/javascript" src="{{ asset('/plugin/jquery-1.9.1.js ') }}"></script>
    </head>
    <body style="width:900px">
    <table class="table table-hover table-top">
        <tr>
            <th  width="50px">序号</th>
            <th  width="80px">业务方向</th>
            <th  width="80px">会员类型</th>
            <th  width="80px">会员名称</th>
            <th  width="80px">手机号</th>
            <th  width="80px">创建时间</th>
            <th  width="80px">账号状态</th>
            <th  width="160px" class="text-right">操作</th>
        </tr>
        @foreach($data as $k=> $v)
            <tr>
                <th scope="row">{{ $v->id }}</th>
                <td>{{ $v->rolename }}</td>
                <td>{{ $v->typename }}</td>
                <td>{{ $v->name}} {{ $v->itemname }}</td>
                <td>{{ $v->mobile}}</td>
                <td>{{ $v->created_at }}</td>
                <td>{{ $v->authestr }}</td>
                <td class="text-right">
                    {!! Form::open([
                  'url' => array('/backend/authe/freeze', $v->id,$v->authestatus),
                    'method' => 'get',
                 'class'=>'btn_form'
                 ]) !!}
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        @if($v->authestatus == 2)
                            取消冻结
                        @else
                            冻结
                        @endif
                    </button>
                    {!! Form::close() !!}
                    {!! Form::open([
                        'url' => array('/backend/authe/view', $v->id),
                        'method' => 'get',
                        'class'=>'btn_form'
                    ]) !!}

                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        查看详情
                    </button>
                    {!! Form::close() !!}

                </td>

            </tr>
        @endforeach
    </table>
                </div>
                  <div class="pull-right"  style="width: 100%;margin-top:-20px;float:right">
                {!! $page_links !!}
            </div>
            </body>
</html>
