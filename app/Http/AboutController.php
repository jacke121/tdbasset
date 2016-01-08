<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\About;

use Redirect, Input, Auth;
class AboutController
{

    public function show($id)
    {
        $about = About::getAboutlById($id);
        return view('about',['about'=>$about]);
    }

}