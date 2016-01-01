<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/31
 * Time: 16:09
 */

namespace App\Http\Controllers\member;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;

class CenterController extends Controller
{
    public function center()
    {
        return view('member.index.center');
    }

    public function info()
    {
        return view('member.index.info');
    }

    public function apply()
    {
        return view('member.index.apply');
    }

    public function collect()
    {
        return view('member.index.collect');
    }
}