<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/31
 * Time: 13:53
 */

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Page;

use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;
use App\Model\Message;
use App\Model\Article;
class IndexControler extends Controller
{
    public function index()
    {
        $zqList =  Zq::orderBy('id', 'DESC')->paginate(5);
        $newsList = Article::where('cate_id',1)->orderBy('id', 'DESC')->paginate(3);
        $infoList = Article::where('cate_id',5)->orderBy('id', 'DESC')->paginate(4);
        return view('themes.default.index',[
            'zqList' => $zqList,
            'newsList' => $newsList,
            'infoList' => $infoList,
        ]);
    }

    public function service()
    {
        return view('themes.default.index.service');
    }

    public function jion()
    {
        return view('themes.default.index.jion');
    }

    public function users()
    {
        return view('themes.default.index.users');
    }

    public function about()
    {
        return view('themes.default.index.about');
    }

    public function message(Request $request)
    {
        $uid = $request->input('uid');
        return view('themes.default.index.message',['uid'=>$uid]);
    }

    public function msave(Request $request)
    {
        $data = new Message;
          $data -> title =  $request->input('title');
          $data -> content = $request->input('content');
          $data -> contact = $request->input('contact');
          $data -> s_uid = Auth::member()->get()->id;
          $data -> r_uid = $request->input('uid');
        $result = "留言失败";
        if( $data->save()){
            $result = "留言成功";
        }
        return $result;
    }
}