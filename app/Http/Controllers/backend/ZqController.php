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
    public function update(Request $request)
    {
        $id = $request->input('id');
        $input = Input::all();

        if(Zq::where("id",$id)->update($input)){
            Cache::forget(Zq::REDIS_ZQ_CACHE.$id);
            return Redirect::to('backend/zq');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    private function createZq(Request $request){
        $zq = new Zq;
        $zq->types = Input::get('types');

        $zq->zq_quote = Input::get('zq_quote');

        $zq->zq_czfs_sscs = Input::get('zq_czfs_sscs');
        $zq->zq_czfs_sscs_rate = Input::get('zq_czfs_sscs_rate');
        $zq->zq_czfs_fscs = Input::get('zq_czfs_fscs');
        $zq->zq_czfs_fscs_rate = Input::get('zq_czfs_fscs_rate');
        $zq->zq_czfs_zqzr = Input::get('zq_czfs_zqzr');
        $zq->zq_czfs_zqzr_rate = Input::get('zq_czfs_zqzr_rate');

        $zq->zq_delay = Input::get('zq_delay');
        $zq->zq_warrant = Input::get('zq_warrant');

        $zq->zq_cscs_ss = Input::get('zq_cscs_ss');
        $zq->zq_cscs_pj = Input::get('zq_cscs_pj');
        $zq->zq_cscs_sd = Input::get('zq_cscs_sd');
        $zq->zq_cscs_dh = Input::get('zq_cscs_dh');
        $zq->zq_cscs_wt = Input::get('zq_cscs_wt');

        $zq->zq_file = Input::get('zq_file');
        $zq->zq_ms = Input::get('zq_ms');

        $zq->o_name = Input::get('o_name');
        $zq->o_province = Input::get('o_province');
        $zq->o_city = Input::get('o_city');
        $zq->o_contry = Input::get('o_contry');
        $zq->o_phone = Input::get('o_phone');
        $zq->o_verify = Input::get('o_verify');
        $zq->o_contact = Input::get('o_contact');
        $zq->o_cphone = Input::get('o_cphone');

        $zq->d_name = Input::get('d_name');
        $zq->d_province = Input::get('d_province');
        $zq->d_city = Input::get('d_city');
        $zq->d_contry = Input::get('d_contry');
        $zq->d_phone = Input::get('d_phone');
        $zq->d_verify = Input::get('d_verify');
        $zq->d_isContact = Input::get('d_isContact');
        $zq->d_isRepay = Input::get('d_isRepay');

        $zq->b_time = Input::get('b_time');
        $zq->b_address = Input::get('b_address');
        $zq->b_isLaw = Input::get('b_isLaw');
        $zq->state = Input::get('state');
        $zq->juid = Input::get('juid');
        $zq->stars = Input::get('indexs');
        $zq->collects = Input::get('collects');
        if(is_null($zq->collects)){
            $zq->collects = 0;
        }
        $zq->applys = Input::get('applys');
        if(is_null( $zq->applys)){
            $zq->applys = 0;
        }
        $zq->delay_scope = Input::get('delay_scope');
        $zq->money_scope = Input::get('money_scope');
        $zq->uid = Input::get('uid');

        //$zq->uid = Auth::user()->id;
        $zq->uid = 1;
        return $zq;
    }
}