<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/10
 * Time: 14:33
 */

namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Collect;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;

class CollectController extends Controller
{

    public function __construct()
    {
        conversionClassPath(__CLASS__);
    }

    public function index(Request $request)
    {
        $zid = $request->input('zid');
        $collectList = Collect::geCollectListByZid($zid);
        return view('backend.content.zq.collect', ['collectList' => $collectList]);
    }
    public function create()
    {
        return backendView('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($zid, Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function  update(Request $request){
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $result = "删除失败";
        $zq = Zq::getZqModelById(Collect::find($id)->zid);
        if(Collect::destroy($id)){
            $result = "删除成功";
            Zq::where('id',$zq->id)->decrement('collects');
        }
        return $result;
    }
}