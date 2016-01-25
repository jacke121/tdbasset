@extends('backend.authe.common')
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
        setmembertype("liwait");
    });

    function search(){
        var params="";
        if($("#idname").val().length>0){
            params+="&name="+$("#idname").val();
        }
        if($("#idmobile").val().length>0){
            params+="&mobile="+$("#idmobile").val();
        }
        if($("#iditemname").val().length>0){
            params+="&itemname="+$("#iditemname").val();
        }
        $('#framemember').attr('src', "/backend/authe/awaiting?way=1"+params);
        }
</script>
@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">待审批列表</div>
                <div class="panel-body">
                     <label>用户名: <input id="idname" type="text" value="{{ old('name') }}" name="name" aria-controls="sample-table-2"></label>
                 <label>手机号: <input id="idmobile"  type="text" name="mobile" aria-controls="sample-table-2"></label>
                  <label>真实姓名: <input id="iditemname" type="text" name="itemname" aria-controls="sample-table-2"></label>
<!--                      <div class="col-sm-offset-2 col-sm-10"> -->
                     <input type="button" onclick="search();" class="btn btn-success" style="background-color: #428bca" value="查询"/>
            <iframe name="typescomment" frameborder=0 id="framemember"	style="width:1000px;height:750px;scrolling:no;"
    		src="{{ asset('/')}}backend/authe/awaiting?way=1">
      </iframe>
            </div>
        </div>
@endsection
