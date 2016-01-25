<div class="panel panel-default">
    <div class="panel-heading">导航</div>
<style>
    li.curli a{
        font-weight:bold
    }
</style>
    <script type="text/javascript">
        function setmembertype(id) {
            //设置button效果，开始计时
            $("#ulmembertype").find("li").attr('class','');
            $("#"+id).attr("class", "curli");
        }
    </script>
    <div class="panel-body text-center">

        <ul id="ulmembertype" class="nav nav-list">
            <li id="linoapprove" >
                <a href="/backend/authe/noapproveindex">未认证会员</a>
            </li>
            <li id="liwait">
                <a href="/backend/authe/awaitindex">待审批会员</a>
            </li>
            <li id="liapproved">
                <a href="/backend/authe/approvedindex">已认证会员</a>
            </li>
        </ul>
    </div>
</div>