<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Hashing\HasherInterface;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Response;
use Illuminate\Http\Request;
use Redirect, Input;
use App\Model\Member;
use App\Model\Member_log;
use Log;
use Hash;
use Auth;
use Validator;
use App\libs\common;
use App\libs\LbgCurl;
use anlutro\cURL\cURL;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Event;

use App\Events\UserRegisteredEvent;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;
    /**
     * Create a new authentication controller instance.
     */
    public function __construct(Guard $auth, Registrar $registrar)  {
        $this->auth = Auth::member();// $auth;
        $this->registrar = $registrar;
        // $this->middleware('auth', ['except' => 'getLogout']);
    }

    public function getLogin(Request $request)  {


        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        Log::error('postlogin:');
        //调用validate验证前端数据
        if (empty($request->get('name'))) {
            return parent::returnJson(1, "用户名不能为空");
        }
        if (empty($request->get('password'))) {
            return parent::returnJson(1, "用户名不能为空");
        }
        $credentials = $request->only('name', 'password');
        Log::error('login:' . $request->get('name') . "password" . $request->get('password'));
        //过滤掉前端数据，只留下name和password
        if ($this->auth->attempt($credentials, $request->has('remember'))) {

             $member_log = new Member_log();
               $member_log->memberid=$this->auth->get()->id;
        $member_log->ip=$request->getClientIp();
        $member_log->action="login";
        $member_log->type=1;
        $member_log->save();
            return parent::returnJson(0, "登录成功");
        }
        return parent::returnJson(1, "用户名或密码错误");

    }

    public function getRegistertype()
    {
        return view('auth.registertype');
    }

    public function getRegister($type)
    {
        return view('auth.register', ['type' => $type, 'content' => $type]);
    }

    public function postCheckuser(Request $request)
    {
        $column = $request->input('column');
        $value = $request->input('value');
        $username = Input::get('username');
        $data = DB::select("select * from members where lifestatus=1 and " . $column . " ='" . $value . "'");
        $code = 0;
        $msg = "用户名可用";
        if (sizeof($data) > 0) {
            $code = 1;
            $msg = "用户名已存在";
        }
        return parent::returnJson($code, $msg);
    }


    public function postCheckname(Request $request)
    {
        $code =1;
        $msg = "用户不存在";
        $type = $request->get('type');
        if($type=="name"){
            $value = $request->get('value');
            $data = DB::select("select * from members where lifestatus=1 and name ='" . $value . "'");
            if (sizeof($data) ==1) {
                Log::error("postCheckname:" . 1);
                $code = 0;
               Session::put('memberd',$data[0]->id);
                $msg = $data[0]->mobile;
            }
        }else if($type=="cardno"){
            $value = $request->get('value');
            $data = DB::select("select * from members where lifestatus=1 and id !=".$this->auth->get()->id." and cardno ='" . $value . "'");
            if (sizeof($data) > 0) {
                Log::error("postCheckemail:" . 1);
                $code = 1;
                $msg = "号码已存在";
            }
        }
        return parent::returnJson($code, $msg);
    }
    public function postCheckapprove(Request $request)
    {
        $code = 0;
        $msg = "可以用";
        $type = $request->get('type');
        if($type=="email"){
            $value = $request->get('value');
            $data = DB::select("select * from members where lifestatus=1 and id !=".$this->auth->get()->id." and email ='" . $value . "'");
            if (sizeof($data) > 0) {
                Log::error("postCheckemail:" . 1);
                $code = 1;
                $msg = "邮箱已存在";
            }
        }else if($type=="cardno"){
            $value = $request->get('value');
            $data = DB::select("select * from members where lifestatus=1 and id !=".$this->auth->get()->id." and cardno ='" . $value . "'");
            if (sizeof($data) > 0) {
                Log::error("postCheckemail:" . 1);
                $code = 1;
                $msg = "号码已存在";
            }
        }
        return parent::returnJson($code, $msg);
    }
    public function postSendsms(Request $request)
    {
        $mobile = Input::get('mobile');
        if (!preg_match("/1[3458]{1}\d{9}$/", $mobile)) {
            // if(!preg_match("/^13\d{9}$|^14\d{9}$|^15\d{9}$|^17\d{9}$|^18\d{9}$/",$mobile)){
            //手机号码格式不对
            return parent::returnJson(1, "手机号码格式不对" . $mobile);
        }
        if ($request->get("type") == "register") {
            $data = DB::select("select * from members where lifestatus=1 and mobile =" . $mobile);
            if (sizeof($data) > 0) {
                return parent::returnJson(1, "手机号已注册");
            }
        }else if($request->get("type") == "forget"){
        	
        	$userInput = $request->get('captcha');
        	
        	Log::error('checkcaptcha:session:' . Session::get('milkcaptcha') . "getcode:" . $userInput);
        	if (Session::get('milkcaptcha') == $userInput) {
        		//用户输入验证码正确return '您输入验证码正确';
        	} else {
        		return parent::returnJson(1, "验证码错误");
        	}
        }
        $checkCode = parent::get_code(6, 1);
        Session::put("m" . $mobile, $checkCode);
        $checkCode = Session::get("m" . $mobile);
        Log::error("sendsms:session:" . $checkCode);
        $msg = "尊敬的用户：" . $checkCode . "是您本次的短信验证码，5分钟内有效.";// Input::get('msg');
        $curl = new cURL;
        $serverUrl = "http://cf.lmobile.cn/submitdata/Service.asmx/g_Submit";
        $response = $curl->get($serverUrl . "?sname=dlrmcf58&spwd=ZRB2aP8K&scorpid=&sprdid=1012818&sdst=" . $mobile . "&smsg=" . rawurlencode($msg . "【投贷宝】"));
        $xml = simplexml_load_string($response);
        echo json_encode($xml);//$xml->State;

//  <CSubmitState xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://tempuri.org/">
//   <State>0</State>
//   <MsgID>1512191953407413801</MsgID>
//   <MsgState>提交成功</MsgState>
//   <Reserve>0</Reserve>
// </CSubmitState>
    }

    public function postCheckcode(Request $request)
    {
        // if ($validator->passes()){
        $mobile = Input::get('mobile');

        $checkCode = Session::get("m" .$mobile);
        Log::error('registrer:' .$mobile . "session:" . $checkCode . "getcode:" . Input::get('checkcode'));
        if (!$checkCode || $checkCode != Input::get('checkcode')) {
            return parent::returnJson(1, "验证码输入错误");
        }
            return parent::returnJson(0, "验证码ok");
            //后边就不写了，主要是拿到登录用户信息就好
    }
    public function postRegister(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3', 'password' => 'required', 'mobile' => 'required|regex:/^1[34578][0-9]{9}$/']);
        // if ($validator->passes()){
        $member = new Member();
        $member->mobile = Input::get('mobile');

        if(!empty($request->get("type")) &&$request->get("type")=="add"){
            Log::error('memberadd:' . $member->mobile. "getcode:" . Input::get('name'));
            $member->name = Input::get('name');
            $member->email = $member->name . "126.com";// Input::get('email');
            $member->password = Hash::make(Input::get('password'));
            $member->created_at = date("Y-m-d H:i:s", time());
            $member->save();
            return parent::returnJson(0, "添加成功");
        }
        $checkCode = Session::get("m" . $member->mobile);
        Log::error('registrer:' . $member->mobile . "session:" . $checkCode . "getcode:" . Input::get('checkCode'));
        if (!$checkCode || $checkCode != Input::get('checkCode')) {
            return parent::returnJson(1, "短信验证码输入错误");
        }
        Log::error('checkcaptcha:session:' . Session::get('milkcaptcha') . "getcode:" .  Input::get('captcha'));
        if (Session::get('milkcaptcha') !=  Input::get('captcha')) {
            return parent::returnJson(1, "图片验证码错误");
        }
        $member->name = Input::get('name');
        $member->email = $member->name . "126.com";// Input::get('email');
        $member->password = Hash::make(Input::get('password'));
        $member->created_at = date("Y-m-d H:i:s", time());
        $member->save();
        if ($this->auth->attempt(array('name' => $member->name, 'password' => Input::get('password')), $request->has('remember'))) {
            //登录成功
        $member_log = new Member_log();
        $member_log->ip=$request->getClientIp();
        $member_log->memberid=$this->auth->get()->id;
        $member_log->action="register";
        $member_log->type=1;
        $member_log->save();
        $userid = $member->id;
            $ip = $_SERVER['REMOTE_ADDR'];
//            Event::fire(new UserRegisteredEvent("111"));
            return parent::returnJson(0, "注册成功");
            //后边就不写了，主要是拿到登录用户信息就好
            // return redirect()->to('/member/index');
            // return Redirect::to('profile');
        } else {
            return parent::returnJson(2, "注册成功,登录失败");
            return redirect()->to('/auth/login');
            // return Redirect::to('auto/login');
        }
    }

    public function postModifymobile(Request $request){
        $checkCode = Session::get("m" . $request->get('mobile'));
        $step= $request->get('step');
        if($checkCode==  $request->get('checkcode')){
          if($step==3){
            //更新手机号
              $array = [ "mobile" => $request->get('mobile') ];
              if (Member::where('id', $this->auth->get()->id)->update($array)) {
                  return parent::returnJson(0, "验证码正确");
              }else{
                  return parent::returnJson(1, "验证码错误");
              }
          }
            return parent::returnJson(0, "验证码正确");
      }
        return parent::returnJson(1, "验证码错误");
    }

    public function postCheckpwd(Request $request)
    {
//        $password = Hash::make( $request->get('password'));
//        Log::error("postCheckpwd:" . $password."**".$this->auth->get()->password);
        if ($this->auth->attempt(array('name' => $this->auth->get()->name, 'password' => $request->get('password')))) {
//        if ($password == $this->auth->get()->password){
        return parent::returnJson(0, "密码正确");
        }
        return parent::returnJson(1, "密码输入错误");
    }

    public function postModifypwd(Request $request) {
        //更新密码
        $array = ["password" => Hash::make($request->get('password'))];

        if(!empty($request->get('mobile'))){
            if (Member::where('mobile', $request->get('mobile'))->update($array)) {
            	$member_log = new Member_log();
            	$member_log->ip=$request->getClientIp();
            	$member_log->memberid= Session::get('memberd');
            	$member_log->action="forgetpwd";
            	$member_log->type=1;
            	$member_log->save();
                return parent::returnJson(0, "密码修改成功");
            }
        }
       else if (Member::where('id', $this->auth->get()->id)->update($array)) {
       	
       	$member_log = new Member_log();
       	$member_log->ip=$request->getClientIp();
       	$member_log->memberid=$this->auth->get()->id;
       	$member_log->action="changepwd";
       	$member_log->type=1;
       	$member_log->save();
            return parent::returnJson(0, "密码修改成功");
        }
        return parent::returnJson(1, "密码修改失败");
    }

        public function getForget(Request $request) {
        //更新密码
       return view('member.index.forget');
    }
    public function getLogout(Request $request)
    {
        $this->auth->logout();
        return redirect('/');
    }
}