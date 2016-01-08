<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\About;
use App\User;
use Illuminate\Http\Request;

class AboutController extends Controller {


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$about = About::getAboutlById($id);
		$aboutList =About::orderBy('priority', 'asc')->paginate(10);
		return view('themes.default.about',['about'=>$about,"aboutList"=>$aboutList]);
	}

}
