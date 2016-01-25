@extends('backend.authe.common')
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
        setmembertype("liwait");
    });

    function search(){

    	$('#framemember').attr('src', "/backend/authe/awaiting?name="+$("#name").val());
// location.href="/backend/authe/awaiting?name="+$("#name").val();
        }
</script>
@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">待审批列表</div>
                <div class="panel-body">
                     <label>用户名: <input id="name" type="text" value="1{{ old('name') }}" name="name" aria-controls="sample-table-2"></label>
                 <label>手机号: <input type="text" name="mobile" aria-controls="sample-table-2"></label>
                  <label>真实姓名: <input type="text" name="realname" aria-controls="sample-table-2"></label>
<!--                      <div class="col-sm-offset-2 col-sm-10"> -->
                     <input type="button" onclick="search();" class="btn btn-success" style="background-color: #428bca" value="查询"/>
            <iframe name="typescomment" frameborder=0 id="framemember"	style="width:1000px;height:750px;scrolling:no;"
    		src="{{ asset('/')}}backend/authe/awaiting">
      </iframe>
            </div>
        </div>
@endsection
