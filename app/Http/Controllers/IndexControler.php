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

class IndexControler extends Controller
{

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