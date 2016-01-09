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
use Log;
use Hash;
use Auth;
use Validator;
use App\libs\common;
use App\libs\LbgCurl;
use anlutro\cURL\cURL;
    use Illuminate\Support\Facades\Session;  
    use Illuminate\Foundation\Auth\ThrottlesLogins;
class AuthController extends Controller {
use AuthenticatesAndRegistersUsers;
	/**
	 * Create a new authentication controller instance.
	 */
	public function __construct(Guard $auth, Registrar $registrar){
		$this->auth =Auth::member();// $auth;
		$this->registrar = $registrar;
		// $this->middleware('auth', ['except' => 'getLogout']);
	}
        public function getLogin(Request $request)//见明之意，就是提交请求到login方法，
        {
          return view('auth.login');
        }
        public function postLogin(Request $request){
           Log::error('postlogin:');
         //调用validate验证前端数据
            if(empty($request->get('name'))){
                return parent::returnJson(1,"用户名不能为空");
            }
            if(empty($request->get('password'))){
                return parent::returnJson(1,"用户名不能为空");
            }
        $credentials = $request->only('name', 'password');
            Log::error('login:'.$request->get('name')."password".$request->get('password'));
        //过滤掉前端数据，只留下name和password
       if ($this->auth->attempt($credentials, $request->has('remember'))){
//           Log::error('postlogin:'.$this->auth->get()->id.$this->auth->get()->mobile);
           return parent::returnJson(0,"登录成功");
         }
            return parent::returnJson(1,"用户名或密码错误");

     }
     public function getRegistertype(){
     return view('auth.registertype');
     }  
          public function getRegister($type){
         return view('auth.register',['type'=>$type,'content'=>$type]);
         }  
       public function postCheckuser(Request $request){
        $column=$request->input('column');
        $value=$request->input('value');
        $username = Input::get('username');
         $data= DB::select("select * from members where lifestatus=1 and ". $column." ='".$value."'");
         $code=0;
         $msg="用户名可用";
      if(sizeof($data)>0){
         $code=1;
           $msg="用户名已存在";
      }
       return parent::returnJson($code, $msg);
}  
    public function postSendsms(Request $request){
      $mobile = Input::get('mobile');
         if(!preg_match( "/1[3458]{1}\d{9}$/",$mobile)){ 
      // if(!preg_match("/^13\d{9}$|^14\d{9}$|^15\d{9}$|^17\d{9}$|^18\d{9}$/",$mobile)){ 
          //手机号码格式不对    
               return parent::returnJson(1,"手机号码格式不对".$mobile);
      }
  
   $data= DB::select("select * from members where lifestatus=1 and mobile =".$mobile);
    if(sizeof($data)>0){
        return parent::returnJson(1,"手机号已注册");
    }

      $checkCode= parent::get_code(6,1);
         Session::put("m".$mobile, $checkCode);
             $checkCode= Session::get("m".$mobile);
                 Log::error("sendsms:session:".$checkCode);
      $msg ="尊敬的用户：".$checkCode."是您本次的短信验证码，5分钟内有效.";// Input::get('msg');
          $curl = new cURL;
          $serverUrl="http://cf.lmobile.cn/submitdata/Service.asmx/g_Submit";
          $response = $curl->get($serverUrl."?sname=dlrmcf58&spwd=ZRB2aP8K&scorpid=&sprdid=1012818&sdst=".$mobile."&smsg=".rawurlencode($msg."【投贷宝】"));
      $xml = simplexml_load_string($response);
       echo json_encode($xml);//$xml->State;

//  <CSubmitState xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://tempuri.org/">
//   <State>0</State>
//   <MsgID>1512191953407413801</MsgID>
//   <MsgState>提交成功</MsgState>
//   <Reserve>0</Reserve>
// </CSubmitState> 
 // <State>1023</State>
 //  <MsgID>0</MsgID>
 //  <MsgState>无效计费条数,号码不规则,过滤[1:186019249011,]</MsgState>
 //  <Reserve>0</Reserve>

} 
public function postRegister(Request $request){

          $this->validate($request, ['name' => 'required|min:3', 'password' =>'required','mobile'=>'required|regex:/^1[34578][0-9]{9}$/']);
//$validator = Validator::make(Input::all(), User::$rules);
         // if ($validator->passes()){
               $member = new Member();
               $member->mobile =Input::get('mobile');

               $checkCode= Session::get("m".$member->mobile);
                 Log::error('registrer:'.$member->mobile."session:".$checkCode."getcode:".Input::get('checkCode'));
              if(!$checkCode ||  $checkCode!=Input::get('checkCode')){
                   return parent::returnJson(1,"验证码输入错误");
              }
               $member->name = Input::get('name');
               $member->email = $member->name ."126.com";// Input::get('email');
               $member->password = Hash::make(Input::get('password'));
             $member->created_at=  date("Y-m-d H:i:s", time());
                 $member->save();
                if($this->auth->attempt(array( 'name'=>$member->name,'password' =>Input::get('password')),$request->has('remember'))) {
         //登录成功
        $userid = $member ->id;
       $ip = $_SERVER['REMOTE_ADDR'];
         return parent::returnJson(0,"注册成功");
      //后边就不写了，主要是拿到登录用户信息就好
       // return redirect()->to('/member/index');
        // return Redirect::to('profile');
            }    else    {
               return parent::returnJson(2,"注册成功,登录失败");
                  return redirect()->to('/auth/login');
                // return Redirect::to('auto/login');
            }
      }
        public function getLogout(Request $request){
          $this->auth->logout();
          return redirect('/');
        }
}