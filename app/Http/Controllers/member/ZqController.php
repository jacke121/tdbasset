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

    public function create(Request $request)
    {
        $template_type = $request->input('types');
        $prefix = 'admin.zq.';
        return view($prefix.$template_type);
    }

    public function store(Request $request)
    {
        $zq = new Zq;
        $zq->types = Input::get('types');
        $zq->zq_quote = Input::get('zq_quote');
        $zq->zq_czfs = Input::get('zq_czfs');
        $zq->zq_delay = Input::get('zq_delay');
        $zq->zq_warrant = Input::get('zq_warrant');
        $zq->zq_cscs = Input::get('zq_cscs');
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
        $zq->indexs = Input::get('indexs');
        $zq->collects = Input::get('collects');
        $zq->applys = Input::get('applys');

        $zq->delay_scope = Input::get('delay_scope');
        $zq->money_scope = Input::get('money_scope');
        $zq->uid = Input::get('uid');

        //$zq->uid = Auth::user()->id;
		$zq->uid = 1;

        if ($zq->save()) {
            return Redirect::to('zqList');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
}