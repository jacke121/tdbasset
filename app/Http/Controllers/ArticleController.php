<?php namespace App\Http\Controllers;

use App\Components\EndaPage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Tag;
use Illuminate\Http\Request;

use App\Model\ArticleStatus;
use App\Model\Article;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catId = $request->input('cateId');
        if(empty( $catId)){
            $catId = 1;
        }
        $articleList = Article::where("cate_id", $catId)->orderBy('id', 'DESC')->paginate(10);
        viewInit();
        return homeView('articlelist', array(
            'articleList' => $articleList,
            'cateId' => $catId
        ));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::getArticleModelByArticleId($id);

        //ArticleStatus::updateViewNumber($id);
        $data = array(
            'article' => $article,
        );
        viewInit();
        return homeView('article', $data);
    }

}
