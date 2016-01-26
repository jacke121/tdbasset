<?php namespace App\Http\Controllers\member;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;
use App\Model\Zq;

class ZqController extends Controller
{
    public function index()
    {
        return view('admin.zq.index');
    }
   public function show()
    {
        return view('admin.zq.index');
    }
    public function create(Request $request)
    {
        $template_type = $request->input('types');
        $prefix = 'admin.zq.';
        return view($prefix.$template_type);
    }

    public function store(Request $request)
    {

        if (self::createZq($request)->save()) {
            return Redirect::to('member/zqList/index');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($zid,Request $request){
        $template_type = $request->input('types');
        $prefix = 'admin.zq.';

        $zq = Zq::getZqModelById($zid);
        return view($prefix.$template_type,["zq"=>$zq]);
    }

    public function  update(Request $request){
        //$zq =  self::createZq($request);
        $id = $request->input('id');

        if(Zq::where("id",$id)->update(self::createUpZq($request))){
            Cache::forget(Zq::REDIS_ZQ_CACHE.$id);
            return Redirect::to('member/zqList/index');
        }
    }

    public function check(Request $request){
        /**
        $zid = $request->input('id');
        $zq = Zq::getZqModelById($zid);
        return view('admin.zq.check',["zq"=>$zq,"isCheck"=>true]);**/
    }

    public function checkUpdate(Request $request){
        /**
        $data = array(
            'status' =>  $request->input('status'),
            'stars' => $request->input('stars'),
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
         * */
    }

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
        $zq->types = Input::get('types');

        $zq->zq_quote = Input::get('zq_quote');

        $zq->zq_czfs_sscs = Input::get('zq_czfs_sscs');

        if(!isset( $zq->zq_czfs_sscs)){
            $zq->zq_czfs_sscs = null;
        }
        $zq->zq_czfs_sscs_rate = Input::get('zq_czfs_sscs_rate');
        $zq->zq_czfs_fscs = Input::get('zq_czfs_fscs');
        if(empty( $zq->zq_czfs_fscs)){
            $zq->zq_czfs_fscs = null;
        }
        $zq->zq_czfs_fscs_rate = Input::get('zq_czfs_fscs_rate');
        $zq->zq_czfs_zqzr = Input::get('zq_czfs_zqzr');
        if(empty( $zq->zq_czfs_zqzr)){
            $zq->zq_czfs_zqzr = null;
        }
        $zq->zq_czfs_zqzr_rate = Input::get('zq_czfs_zqzr_rate');

        $zq->zq_delay = Input::get('zq_delay');
        $zq->zq_warrant = Input::get('zq_warrant');

        $zq->zq_cscs_ss = Input::get('zq_cscs_ss');
        $zq->zq_cscs_pj = Input::get('zq_cscs_pj');
        $zq->zq_cscs_sd = Input::get('zq_cscs_sd');
        $zq->zq_cscs_dh = Input::get('zq_cscs_dh');
        $zq->zq_cscs_wt = Input::get('zq_cscs_wt');

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

        if(!empty(Input::get('zq_warrant'))){
            $zq-> zq_warrant = implode("_",Input::get('zq_warrant'));
        }

        $zq->uid = Auth::member()->get()->id;

        $cart= parent::movefile($request,"project");
        if($cart['status']==1){
//            return parent::returnJson(1,$cart['msg']);
        }else{
            $zq->zq_file = $cart['msg'];
        }
        return $zq;
    }

    private function createUpZq(Request $request){
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

            'uid' =>  Auth::member()->get()->id
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

        $cart= parent::movefile($request,"project");
        if($cart['status']==1){
//            return parent::returnJson(1,$cart['msg']);
        }else{
            $data['zq_file'] = $cart['msg'];
            $fileUp = Input::get('fileUp');
            if(!empty($fileUp)){
                $data['zq_file']=implode(";",$fileUp).";".$data['zq_file'];
            }
        }

        return $data;
    }
}