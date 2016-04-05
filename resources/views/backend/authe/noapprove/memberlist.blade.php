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
        span.current{
            font-weight:bold
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
    <script type="text/javascript">
        //全选、反选
        $(function (){
            $("#top_selectAll").change(function(){
                $('input[type=checkbox]').prop("checked",$(this).prop("checked"));
            });
//            $("#top_selectAll").click(function() {
//                $('input[type=checkbox]').attr("checked",$(this).attr("checked")?true:false);
//            });
        });
    </script>
    </head>
    <body style="width:900px">
    <table class="table table-hover table-top">
        <tr>
            <th width="70px"> <input name="top_selectAll" id="top_selectAll" type="checkbox" value=""/>&nbsp;全选</th>
            <th>序号</th>
            <th>业务方向</th>
            <th>会员类型</th>
            <th>会员名称</th>
            <th>手机号</th>
            <th>创建时间</th>
            <th>账号状态</th>
            <th class="text-right">操作</th>
        </tr>

        @foreach($data as $k=> $v)
            <tr>
                <td> <input name="top_selectAll" id="top_select" type="checkbox" value="{{ $v->id }}"/>&nbsp;</td>
                <td scope="row">{{$k+1}}
                    <input type="hidden" name="id" value="{{$v->id}}" />
                </td>
                <td>{{ $v->roletype }}</td>
                <td>{{ $v->type }}</td>
                <td>{{ $v->name}} {{ $v->itemname }}</td>
                <td>{{ $v->mobile}}</td>
                <td>{{ $v->created_at }}</td>
                <td>{{ $v->authestr }}</td>
                <td class="text-right">
                    {!! Form::open([
                        'url' => array('/backend/authe/view', $v->id),
                        'method' => 'get',
                        'class'=>'btn_form',
                        'target'=>"_blank"
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
