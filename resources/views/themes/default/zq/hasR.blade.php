<div style=" width:481px; float:right;">
    <div class="informationTwo">
        <h3 class="inf_h3">债权方信息</h3>
        <div class="writeBox">
            <p>债权方名称:{{ $page->o_name }}</p>
            <p>债权方地址：{{ $page->o_province }} {{ $page->o_city }} {{ $page->o_contry }}</p>
        </div>
        <div class="blueBox">
            <p>债权方联系电话：{{ $page->o_phone }}</p>
            <p>债权方证件号：{{ $page->o_verify}}</p>
        </div>
        <div class="writeBox">
            <p>债权方联系人姓名：{{ $page->o_contact}}</p>
            <p>债权方联系人电话：{{ $page->o_cphone}}</p>
            <p>债权方联系人身份证号：无</p>
        </div>
    </div>
    <div class="informationThree">
        <h3 class="inf_h3">债务方信息</h3>
        <div class="writeBox">
            <p>债务方名称:{{ $page->d_name }}</p>
            <p>债务方地址：{{ $page->d_province }} {{ $page->d_city }} {{ $page->d_contry }}</p>
        </div>
        <div class="blueBox">
            <p>债务方类型：{{ $page->d_type }}</p>
        </div>
        <div class="writeBox">
            <p>债务方联系电话：{{ $page->d_phone }}</p>
            <p>债务方现住地址：{{ $page->d_phone }}</p>
            <p>债务方实际经营地址：{{ $page->d_phone }}</p>
            <p>债务方证件号：{{ $page->d_phone }}</p>
            <p>债务方资产状况：{{ $page->d_phone }}</p>
            <p>企业类债务方经营状况：</p>
            <p>债务方所处行业：</p>
            <p>债务方婚姻状况：</p>
            <p>债务方学历状况：</p>
            <p>债务方负责人身体状况：</p>
            <p>债务方家庭成员状况：</p>
            <p>债务方社会关系状况：</p>
        </div>
    </div>
</div>