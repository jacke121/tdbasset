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

use Redirect, Input, Auth;
use App\Model\Zq;
use App\Model\Article;

class IndexControler extends Controller
{
    public function index()
    {
        $zqList =  Zq::orderBy('id', 'DESC')->paginate(5);
        $newsList = Article::orderBy('id', 'DESC')->paginate(3);
        $infoList = Article::orderBy('id', 'DESC')->paginate(5);
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
}