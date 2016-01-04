<?php namespace App\Http\Controllers\member;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/31
 * Time: 16:09
 */
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Collect;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Apply;

class CenterController extends Controller
{
    public function getCenter()
    {
        return view('member.index.center');
    }
    public function getCollect()
    {
        return view('member.index.collect',['collectList' => Collect::where("uid",1)->orderBy('id', 'DESC')->paginate(10)]);
    }
    public function getSysinfo()
    {
        return view('member.index.sysinfo');
    }

    public function getApply(Request $request)
    {
        /**
        $types =  $request->input('types');
        $paramArr = ["uid"=>1];
        if(!is_null($types)){
            $paramArr = array_merge($paramArr,["types"=>$types]);
        }**/
        return view('member.index.apply',['appList' => Apply::where("uid",1)->orderBy('id', 'DESC')->paginate(10)]);
    }

    public function getSecurity()
    {
        $user = Auth::member();
        return view('member.index.security',['user'=>$user]);
    }
}