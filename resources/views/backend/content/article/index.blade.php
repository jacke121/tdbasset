@extends('backend.content.common')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">内容管理</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.article.create')}}">写文章</a>
                    <ul class="list-inline pull-right">
                        <li><label class="checkbox-inline" for="cates_0"><input id="cates_0" class="cates" type="radio" @if($cateId== 0)checked="checked"@endif name="cates" value="0">全部</label></li>
                        @foreach($cates as $k=> $v)
                            <li><label class="checkbox-inline" for="cates_{{$v->id}}"><input id="cates_{{$v->id}}" class="cates"  @if($cateId==$v->id)checked="checked"@endif type="radio" name="cates" value="{{$v->id}}">{{$v->cate_name}}</label></li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                    <table class="table table-hover table-top">
                        <meta name="_token" content="{!! csrf_token() !!}"/>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>所属分类</th>
                            <th>创建时间</th>
                            <th class="text-right">操作</th>
                        </tr>

                        @foreach($article as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->title }}</td>
                            <td>{{ App\Model\Category::getCategoryNameByCatId($v->cate_id) }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">

                                {!! Form::open([
                                    'route' => array('backend.article.edit', $v->id),
                                    'method' => 'get',
                                    'class'=>'btn_form pull-left'
                                ]) !!}

                                <button type="submit" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    修改
                                </button>
                                {!! Form::close() !!}

                                <button type="submit" class="btn btn-danger pull-right" onclick="deleteArticle({{$v->id}})">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    删除
                                </button>

                                <div class="clearfix"></div>
                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
                {!! $article->appends(['cateId'=>$cateId])->render() !!}
            </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $(".cates").click(function() {
                    var val = $('input:radio[name="cates"]:checked').val();
                    window.location.href = "{{URL('backend/article?cateId=')}}"+val;
                });
            });
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            function deleteArticle(params) {
                var isDelete = window.confirm("您确定要删除本条记录?删除后不能恢复！");
                if (isDelete) {
                    $.ajax({
                        url: '{{url('backend/article/destroy')}}',
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
