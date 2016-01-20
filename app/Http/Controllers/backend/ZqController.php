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
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;

class ZqController extends Controller
{

    public function __construct()
    {
        conversionClassPath(__CLASS__);
    }

    public function index()
    {
        return view('backend.content.zq.index', ['zqList' => Zq::orderBy('id', 'DESC')->paginate(10)]);
    }
    public function create()
    {
        return backendView('create');
    }

    public function check(Request $request){
        $zid = $request->input('id');
        $zq = Zq::getZqModelById($zid);
        return view('backend.content.zq.check',["zq"=>$zq,"isCheck"=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $zq = self::createZq($request);
        if ($zq->save()) {
            return Redirect::to('member/zqList/index');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $zq = Zq::getZqModelById($id);
        return view('backend.content.zq.detail',["zq"=>$zq]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($zid, Request $request)
    {
        $template_type = $request->input('types');
        $prefix = 'backend.content.zq.';

        $zq = Zq::getZqModelById($zid);
        return view($prefix.$template_type,["zq"=>$zq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function  update(Request $request){
        $id = $request->input('id');

        if(Zq::where("id",$id)->update(self::createZq($request))){
            Cache::forget(Zq::REDIS_ZQ_CACHE.$id);
            return Redirect::to('backend/zq');
        }
    }

    public function checkUpdate(Request $request){
        $data = array(
            'status' =>  $request->input('status'),
            'stars' => $request->input('stars'),
            'reasons' => $request->input('reasons'),
            'delay_scope' => $request->input('delay_scope'),
            'money_scope' => $request->input('money_scope')
        );
        $id = $request->input('id');
        $result = "审核失败";
        if(Zq::where('id', $id)->update($data)){
            Cache::forget(Zq::REDIS_ZQ_CACHE.$id);
            $result = "审核成功";
        }
        return $result;
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
        if(Zq::destroy($id)){
            $result = "删除成功";
        }
        return $result;
    }

    private function createZq(Request $request){
        $zq = new Zq;
        $data = array(
            'types' => Input::get('types'),

            'zq_quote'  =>  Input::get('zq_quote'),

            'zq_czfs_sscs'  =>  Input::get('zq_czfs_sscs'),
            'zq_czfs_sscs_rate' =>  Input::get('zq_czfs_sscs_rate'),
            'zq_czfs_fscs'  => Input::get('zq_czfs_fscs'),
            'zq_czfs_fscs_rate' =>  Input::get('zq_czfs_fscs_rate'),
            'zq_czfs_zqzr'  =>  Input::get('zq_czfs_zqzr'),
            'zq_czfs_zqzr_rate'  => Input::get('zq_czfs_zqzr_rate'),

            'zq_delay'  =>  Input::get('zq_delay'),
            'zq_warrant'  =>  Input::get('zq_warrant'),

            'zq_cscs_ss'  =>  Input::get('zq_cscs_ss'),
            'zq_cscs_pj'  =>  Input::get('zq_cscs_pj'),
            'zq_cscs_sd'  =>  Input::get('zq_cscs_sd'),
            'zq_cscs_dh' => Input::get('zq_cscs_dh'),
            'zq_cscs_wt'  =>  Input::get('zq_cscs_wt'),

            'zq_file'  =>  Input::get('zq_file'),
            'zq_ms'  =>  Input::get('zq_ms'),

            'o_name'  =>  Input::get('o_name'),
            'o_province'  =>  Input::get('o_province'),
            'o_city'  =>  Input::get('o_city'),
            'o_contry'  => Input::get('o_contry'),
            'o_phone'  => Input::get('o_phone'),
            'o_verify'  => Input::get('o_verify'),
            'o_contact'  => Input::get('o_contact'),
            'o_cphone'  => Input::get('o_cphone'),

            'd_name'  => Input::get('d_name'),
            'd_province'  => Input::get('d_province'),
            'd_city'  => Input::get('d_city'),
            'd_contry'  => Input::get('d_contry'),
            'd_phone'  => Input::get('d_phone'),
            'd_verify'  => Input::get('d_verify'),
            'd_isContact'  => Input::get('d_isContact'),
            'd_isRepay'  => Input::get('d_isRepay'),

            'b_time'  => Input::get('b_time'),
            'b_address'  => Input::get('b_address'),
            'b_isLaw'  => Input::get('b_isLaw'),
            'state'  => Input::get('state'),
            'juid'  => Input::get('juid'),
            'stars'  => Input::get('indexs'),
            'collects'  => Input::get('collects'),
            'applys'  => Input::get('applys'),
            'delay_scope'  => Input::get('delay_scope'),
            'money_scope'  => Input::get('money_scope'),

            'uid' => Auth::user()->get()->id
        );
     
        $zq->zq_czfs_sscs = Input::get('zq_czfs_sscs');
        $zq->zq_czfs_fscs = Input::get('zq_czfs_fscs');
        $zq->zq_czfs_zqzr = Input::get('zq_czfs_zqzr');
        if(empty($zq->zq_czfs_sscs)){
            $data['zq_czfs_sscs']= false;
        }
        if(empty($zq->zq_czfs_fscs)){
            $data['zq_czfs_fscs']= false;
        }
        if(empty($zq->zq_czfs_zqzr)){
            $data['zq_czfs_zqzr']= false;
        }
        if(!empty(Input::get('zq_warrant'))){
            $data['zq_warrant']= implode("_",Input::get('zq_warrant'));
        }
        return $data;
    }
}