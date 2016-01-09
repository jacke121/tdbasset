<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/28
 * Time: 19:22
 */
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Page;

use Redirect, Input, Auth;

use App\Model\Zq;
use App\Model\Apply;
use App\Model\Collect;
class ZqController extends Controller {

    public function index(Request $request)
    {
        $template_type = $request->input('types');
        $debt_money = $request->input('debt_money');
        $debt_time = $request->input('debt_time');
        $province = $request->input('province');
        $city = $request->input('city');
        $area = $request->input('area');

        $moneyArr = [];
        $timeArr = [];
        $proArr = [];
        $cityArr = [];
        $areaArr = [];

        $where = [];
       // $where = array_merge($moneyArr,$timeArr,$proArr,$cityArr,$areaArr);

        if(is_null($template_type)){
            $template_type = "gr";
        }
        if(is_null($debt_money)){
            $debt_money = 0;
        }else{
            $moneyArr = ['money_scope'=>$debt_money];
            $where = array_merge($where,$moneyArr);
        };
        if(is_null($debt_time)){
            $debt_time = 0;
        }else{
            $timeArr = ['delay_scope'=>$debt_time];
            $where = array_merge($where,$timeArr);
        }
        if(is_null($province)){
            $province = "请选择省份";
        }else{
            $proArr = ['o_province'=>$province];
            $where = array_merge($where,$proArr);
        }
        if(is_null($city)){
            $city = "请选择城市";
        }else{
            $cityArr = ['o_city'=>$city];
            $where = array_merge($where,$cityArr);
        }
        if(is_null($area)){
            $area = "请选择地区";
        }else{
            $areaArr = ['o_contry'=>$area];
            $where = array_merge($where,$areaArr);
        }

        $zqList =  Zq::orderBy('id', 'DESC')->paginate(10);
        //$zqList = Zq::getZqList($province, $city, $area, $debt_money, $debt_time,$where, 10);
        viewInit();
        //$page = new EndaPage($zqList['page']);
        return view('themes.default.zq',[
            'zqList' => $zqList,
            'types' => $template_type,
            'debt_money' => $debt_money,
            'debt_time' => $debt_time,
            'province' => $province,
            'city' => $city,
            'area' => $area
           //, 'page' => $page
        ]);
    }

    public function show($id)
    {
        $zq = Zq::find($id);
        $applyList = Apply::getApplyList(1,$id);
        $collectList = Collect::geCollectList(1,$id);
        $isApply = true;
        if(is_null($applyList)){
            $isApply = false;
        }
        $isCollect = true;
        if(is_null($isCollect)){
            $isCollect = false;
        }
        //return view('themes.default.zq.show')->withPage(Zq::find($id));
        return view('themes.default.zq.show',[
            'page'=>$zq,
            'isApply'=>$isApply,
            'isCollect'=>$isCollect
        ]);
    }

    public function apply(Request $request)
    {
        $zid =  $request->input('zid');
        $apply = new Apply;
        $apply->zid = $zid;
        $apply->uid = 1;
        $result = "申请失败";
        if($apply ->save()){
            Zq::updateAppNumber($zid);
            $result = "申请成功";
        };
       return  $result;
    }

    public function collect(Request $request)
    {
        $zid =  $request->input('zid');
        $collect = new Collect;
        $collect->zid = $zid;
        $collect->uid = 1;
        $result = "收藏失败";
        if($collect ->save()){
            Zq::updateCollectNumber($zid);
            $result = "收藏成功";
        };
        return  $result;
    }
}