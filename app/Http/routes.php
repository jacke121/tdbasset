<?php

/*
| Application Routes | Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to and give it the controller to call when that URI is requested.
*/

Route::get('auth/register/{type}', 'Auth\AuthController@getRegister');

Route::resource('article', 'ArticleController');
Route::resource('comment', 'CommentController');
Route::resource('category', 'CategoryController');

Route::resource('about', 'AboutController');

Route::get('/', 'IndexControler@index');
Route::get('service', 'IndexControler@service');
Route::get('jion', 'IndexControler@jion');
Route::get('users', 'IndexControler@users');
//Route::get('about', 'IndexControler@about');

Route::post('zq/apply', 'ZqController@apply');
Route::post('zq/collect', 'ZqController@collect');
Route::resource('zq','ZqController');
Route::controllers([
    'backend/password' => 'backend\PasswordController',
    'search'=>'SearchController',
     'auth'=>'Auth\AuthController'
]);
Route::group(['prefix'=>'backend','middleware'=>'backauth'],function(){
    Route::any('/','backend\HomeController@index');
    Route::resource('home', 'backend\HomeController');
    Route::resource('cate','backend\CateController');
    Route::resource('content','backend\ContentController');
    Route::resource('article','backend\ArticleController');
    Route::resource('tags','backend\TagsController');
    Route::resource('user','backend\UserController');
    Route::resource('comment','backend\CommentController');
    Route::resource('nav','backend\NavigationController');
    Route::resource('links','backend\LinksController');
    Route::controllers([
        'system'=>'backend\SystemController',
        'upload'=>'backend\UploadFileController',
        'auth'=>'backend\auth\AuthController',
        'authe'=>'backend\AuthenticateController'
    ]);

});
Route::group(['prefix'=>'member','middleware'=>'auth'],function(){
    Route::any('/{name?}','member\HomeController@index');
    Route::get('index', 'member\HomeController@index');
    Route::resource('content','member\ContentController');
    Route::resource('article','member\ArticleController');
    Route::resource('tags','member\TagsController');
    Route::resource('user','member\UserController');
    Route::resource('comment','member\CommentController');
    Route::resource('nav','member\NavigationController');

    Route::get('zqm/check', 'member\ZqController@check');
    Route::post('zqm/store', 'member\ZqController@store');
    Route::resource('zqm', 'member\ZqController');
    Route::controller('center','member\CenterController');
    Route::get('zqList/index','member\ZqListController@index');
    Route::controller('authe','member\AuthenticateController');

});