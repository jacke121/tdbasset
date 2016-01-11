<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 0:55
 */

namespace App\Http\Controllers\member;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Notification, Auth,Cache;
use App\Model\Zq;

class ZqListController extends Controller
{
    public function index()
    {
        $zqList = Zq::where("uid", Auth::member()->get()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.zq.list', ['zqList' => $zqList]);
    }
}