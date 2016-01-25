<?php namespace
App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;

class AboutController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public static function show()
	{
		/**
		$about = Article::find($id);
		$aboutList = Article::where('cate_id',3)->orderBy('priority', 'asc')->paginate(10);
		return view('themes.default.about',['about'=>$about,"aboutList"=>$aboutList]);
		 */
		return view('themes.default.index.service');
	}



}
