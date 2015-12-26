    @include('themes.default.top')
 @extends('member.common') 
@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">内容管理</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ url('/backend/system/create') }}">创建设置</a>

                    <form action="{{ url('backend/system/store')}}" method="post" class="form-horizontal" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table table-hover table-top">
                            <tr>
                                <th>#</th>
                                <th>名称</th>
                                <th>值</th>
                                <th class="text-right">操作</th>
                            </tr>

                        </table>

                        <button type="submit" class="btn btn-success">
                            保存
                        </button>

                    </form>
                </div>
            </div>
        </div>
@endsection
