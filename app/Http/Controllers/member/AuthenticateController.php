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
        Log::error('getIndex:'.$member->authestatus);
        if ($member->authestatus > 0) {
            if ($member->type == 1) {
                return view('member.authed.authelayer', ['type' => "repeat"]);
            } else if ($member->type == 2) {
                return view('member.authed.authecompany', ['type' => "repeat"]);
            } else if ($member->type == 3) {
                return view('member.authed.autheperson', ['type' => "repeat"]);
            }
        }
        return view('member.index.authelayer', ['type' => "index"]);
    }

    public function getAuthelayer(Request $request)
    {

        return view('member.index.authelayer', ['type' => "repeat"]);
    }

    public function postAuthelayer(Request $request)
    {
        Log::error('postAuthelayer:' . $request->get('itemname'));
        $cart= $this->movefile($request);
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

    public function getAutheperson(Request $request)//见明之意，就是提交请求到login方法，
    {
        return view('member.index.autheperson');
    }

    private function movefile(Request $request){

        $cart = array();
        $cart['status'] =1;
        $cart['msg'] ="图片不能为空";
        $path="";
        if ($request->hasFile('file')) {
            $rules = array();
            if (!array($request->File('file'))) {
                $file = $request->file('file');
                $allowed_extensions = ["png", "jpg", "gif"];
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    $cart['status']=1;
                    $cart['msg'] ="图片只支持png,jpg,gif";
                    return $cart;
                }
                $destinationPath = 'uploads/images/person/';
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(10).'.'.$extension;
                $file->move($destinationPath, $fileName);
                $path=$destinationPath.$fileName;
            } else {
                for ($i = 0; $i < count($request->File('file')); $i++) {
                    $rules["file.$i"] = 'required|image';
                    Log::error("postfile" . $i);
                }
                $files = $request->File('file');
                foreach ($files as $file) {
                    Log::error($file->getClientOriginalName());
                    $allowed_extensions = ["png", "jpg", "gif"];
                    if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                        $cart['status']=1;
                        $cart['msg'] ="图片只支持png, jpg or gif";
                        return $cart;
                    }
                    $destinationPath = 'uploads/images/person/';
                    $extension = $file->getClientOriginalExtension();
                    $fileName = str_random(10) .'.'.$extension;
                    $file->move($destinationPath, $fileName);
                    if(empty($path)){
                        $path.=$destinationPath.$fileName;
                    }else{
                        $path.=";".$destinationPath.$fileName;
                    }

                }
            }
            $cart['status'] =0;
            $cart['msg'] =$path;
        }
        return $cart;
    }
    public function postAutheperson(Request $request)
    {
        $cart= $this->movefile($request);
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

    public function getAuthecompany(Request $request)//见明之意，就是提交请求到login方法，
    {
        return view('member.index.authecompany');
    }

    public function postAuthecompany(Request $request)
    {
        $cart= $this->movefile($request);
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
        if (!empty($fileName)) {
            $member->cardnourl =$cardnourl;
        }
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
