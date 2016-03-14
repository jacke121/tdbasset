<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/4
 * Time: 20:01
 */

namespace App\Http\Controllers\member;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;
use App\Model\Apply;
use App\Model\Collect;

class SocialController extends Controller
{
    public function collect(Request $request)
    {
        $zid = $request->input('zid');
        $collectList = Collect::geCollectListByZid($zid);
        return view('admin.zq.collect', ['collectList' => $collectList]);
    }

    public function apply(Request $request)
    {
        $zid = $request->input('zid');
        $applyList = Apply::getApplyListByZid($zid);
        return view('admin.zq.apply', ['applyList' => $applyList]);
    }
}