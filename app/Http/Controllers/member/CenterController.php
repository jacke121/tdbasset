<?php namespace App\Http\Controllers\member;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/31
 * Time: 16:09
 */
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;

class CenterController extends Controller
{
    public function getCenter()
    {
        return view('member.index.center');
    }

    public function getSysinfo()
    {
        return view('member.index.sysinfo');
    }

    public function getApply()
    {
        return view('member.index.apply');
    }

    public function getSecurity()
    {
        return view('member.index.security');
    }
}