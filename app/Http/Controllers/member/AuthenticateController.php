<?php namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Response;
use Illuminate\Http\Request;
use App\Model\Member;
use Log;
use Auth;

class AuthenticateController extends Controller
{
    /**
     * Create a new authentication controller instance.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = Auth::member();// $auth;
    }

    public function getIndex(Request $request)
    {
        $member = Member::find($this->auth->get()->id);
        $member->cardnourl = explode(";",$member->cardnourl);
        Log::error('getIndex:'.$member->authestatus.",".$member->type);
        $type="repeat";
        if ($member->authestatus ==4 || $member->authestatus ==2||$member->authestatus ==1) {
            if ($member->type == 1) {
                return view('member.authed.authelayer', compact('type','member'));
            } else if ($member->type == 2) {
                return view('member.authed.authecompany',compact('type','member'));
            } else if ($member->type == 3) {
                return view('member.authed.autheperson',compact('type','member'));
            }
        } else if ($member->authestatus ==3) {
        	if ($member->type == 1) {
        		return view('member.index.authelayer', compact('type','member'));
        	} else if ($member->type == 2) {
        		return view('member.index.authecompany',  compact('type','member'));
        	} else if ($member->type == 3) {
        		return view('member.index.autheperson', compact('type','member'));
        	}
        }
        $type="index";
        return view('member.index.authelayer', compact('type','member'));
    }

  

    public function postAuthelayer(Request $request)
    {
        Log::error('postAuthelayer:' . $request->get('itemname'));
        $cart= $this->movefile($request,"layer");
        if($cart['status']==1){
            return parent::returnJson(1,$cart['msg']);
        }else{
            $cardnourl= $cart['msg'];
        }
        // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
        $member = new Member();
        $member->id = $this->auth->get()->id;
        $member->type = 1;
        $member->authestatus = 1;
        $member->roletype = $request->get('roletype');
        $member->cardnourl = $cardnourl;
        $member->address = $request->get('address');
        $member->addresscode = $request->get('addresscode');
        $member->itemname = $request->get('itemname');
        $member->email = $request->get('email');
        $member->cardno = $request->get('cardno');
        $member->updatememberInfo($member->id, $member);
        return parent::returnJson(0, "提交成功");
    }

    public function postAutheperson(Request $request)
    {
        $cart= $this->movefile($request,"person");
        if($cart['status']==1){
            return parent::returnJson(1,$cart['msg']);
        }else{
            $cardnourl= $cart['msg'];
        }

        // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
        $member = new Member();
        $member->id = $this->auth->get()->id;
        $member->type = 3;
        $member->authestatus = 1;
        $member->address = $request->get('address');
        $member->addresscode = $request->get('addresscode');
        $member->roletype = $request->get('roletype');
        $member->itemname = $request->get('itemname');
        $member->email = $request->get('email');
        $member->cardnourl =$cardnourl;
        $member->cardno = $request->get('cardno');
        $member->updatememberInfo($member->id, $member);
        return parent::returnJson(0, "提交成功");
    }
    public function getAuthelayer(Request $request)
    {	$type="repeat";
    $member = $this->auth->get();
    return view('member.index.authelayer', compact('type','member'));
    }
    public function getAutheperson(Request $request)
    {	$type="repeat";
        $member = $this->auth->get();
        return view('member.index.autheperson', compact('type','member'));
    }
    public function getAuthecompany(Request $request)//见明之意，就是提交请求到login方法，
    {
    $type="repeat";
    $member = $this->auth->get();
        return view('member.index.authecompany',compact('type','member'));
    }

    public function postAuthecompany(Request $request)
    {
        $cart= parent::movefile($request,"company");
        if($cart['status']==1){
            return parent::returnJson(1,$cart['msg']);
        }else{
            $cardnourl= $cart['msg'];
        }
        // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
        $member = new Member();
        $member->id = $this->auth->get()->id;
        $member->type = 2;
        $member->authestatus = 1;
        $member->cardnourl =$cardnourl;
        $member->address = $request->get('address');
        $member->addresscode = $request->get('addresscode');
        $member->roletype = $request->get('roletype');
        $member->itemname = $request->get('itemname');
        $member->email = $request->get('email');
        $member->cardno = $request->get('cardno');
        $member->updatememberInfo($member->id, $member);
        return parent::returnJson(0, "提交成功");
    }
}
