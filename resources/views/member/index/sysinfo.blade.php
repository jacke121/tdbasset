<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
      setindex("cen_info");
    });
</script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        @include('member.left_nav')
<!--系统消息-->
	<div class="mainr" >
        <div class="ser_wei">
            <h3>系统消息</h3>
              <input type="hidden" value="1">
              <input type="hidden" value="1">
              <input type="hidden" value="1">
            <div class="ser_weicon" style="display: none;">
               <p> 亲、目前暂无任何系统信息！<br>再去<a href="index.html">首页</a>转转吧~</p>
            </div>
            <div class="wei_table" id="openTable">
               <table>
                    <tbody>
                        <tr class="tabletit">
                           <td>时间</td>
                           <td>消息名称</td>
                           <td>内容</td>
                           <td>操作</td>
                        </tr>
                         <tr class="tcur" id="tr0" style="color: gray;">
                            <td>2015-11-27</td>
                            <td><span>【注册信息】</span></td>
                            <td><p class="content">欢迎您成为投贷宝的临时会员，请牢记您的登录账号：用户名;请进行资质认证成为正式会员参与平台投标服务哦</p></td>
                            <td><a href="javascript:void(0);" class="look">查看</a><a href="javaScript:void(0)" class="del">删除消息</a></td>
                        </tr>
                    </tbody>
                </table>
                <div id="pager">
                    <ul class="pages">
                        <li class="lispe" id="pageCountInfo">共1条记录  第1/1页</li>
                        <li class="pg下一页 pgEmpty">首页</li>
                        <li class="pg下一页 pgEmpty">上一页</li>
                        <li class="page-number pgCurrent">1</li>
                        <li class="pg下一页 pgEmpty">下一页</li>
                        <li class="pg下一页 pgEmpty">尾页</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
</div>
<!-- 弹出层-->
        <div class="tan" style="display:none;">
            <p class="tan_icon">
            <span class="dui" style="display: none;"></span>
            <span class="cuo"></span>
            </p>
            <p class="tants" id="alertInfo" style="display: block;">您的认证信息已提交,我们会在一个工作小时内为您完成审核</p>
            <p class="tanp">
            <input type="submit" class="tanbtn" value="确认">
            </p>
        </div>
    </div>
    <div style="clear:both;"></div>
        </div>
    </div>
    </div>
        <div style="clear:both;"></div>


    
</div>

<!--foot部分-->
@include('themes.default.foot')
</body>
</html>
