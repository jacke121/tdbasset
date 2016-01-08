<?php namespace  App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Hashing\HasherInterface;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests;
use App\Http\Response;
use Illuminate\Http\Request;
use Redirect, Input;
use App\User;
use Log;
use Hash;
use Auth;
use Config;
use Validator;
use App\libs\common;
use App\libs\LbgCurl;
use anlutro\cURL\cURL;
use Illuminate\Routing\Route;
    use Illuminate\Support\Facades\Session;  
class AuthController extends Controller {
	use AuthenticatesAndRegistersUsers;
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
      
		$this->auth = Auth::user();//$auth;
		$this->registrar = $registrar;
		// $this->middleware('auth', ['except' => 'getLogout']);
	}
        public function getLogin(Request $request)//见明之意，就是提交请求到login方法，
        {
             return view('backend.auth.login');
        }
        public function postLogin(Request $request,Route $route)    {
            //调用validate验证前端数据
                  $name = Input::get('name');
               // $member->email = $member->name ."126.com";// Input::get('email');
                // $password ='123456';// Hash::make(Input::get('password'));
                $password =Input::get('password');
                   Log::error("backendgetLogin: ". $name. $password);
                 $this->validate($request, ['name'=> 'required', 'password'=> 'required']);
                $credentials = $request->only('name', 'password');//过滤掉前端数据，只留下email和password
                  if($this->auth->attempt(array( 'name'=>$name,'password' =>$password))) {
                 // if ($this->auth->attempt($credentials, $request->has('remember')))//重点就是这一个attempt方法，这个就是验证用户数据数据和数据库数据作比较的流程
                 {
                   Log::error("getLogin1");
                       return redirect()->intended("backend/home");//验证通过则跳入主页
                     // return redirect()->intended($this->redirectPath());//验证通过则跳入主页
                 }
               return redirect($request->back())//$this->loginPath())
                           //withInput(),负责数据写入session
                           ->withInput($request->only('name', 'password'))//验证失败，即输入数据和数据库数据不一致，携带错误信息返回到登录界面
                            ->withErrors([
                               'name'=> $this->getFailedLoginMessage(),
                            ]);
             }}
             public function registertype(){
             return view('auth.registertype');
             }
                  public function getRegister($type){
               // var_dump($type);
             return view('auth.register',['type'=>$type,'content'=>$type]);
             }
            
              public function sendsms(Request $request){

          $checkCode= parent::get_code(6,1);
          $sdst = Input::get('sdst');
             Session::put($sdst, $checkCode);  
          //$type = Input::get('type');

          $msg ="尊敬的用户：".$checkCode."是您本次的短信验证码，5分钟内有效.";// Input::get('msg');
              $curl = new cURL;
              $serverUrl="http://cf.lmobile.cn/submitdata/Service.asmx/g_Submit";
              $response = $curl->get($serverUrl."?sname=dlrmcf58&spwd=ZRB2aP8K&scorpid=&sprdid=1012818&sdst=".$sdst."&smsg=".rawurlencode($msg."【投贷宝】"));
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
public function store(Request $request){
          $this->validate($request, ['name' => 'required|min:3', 'password' =>'required','mobile'=>'required|regex:/^1[34578][0-9]{9}$/']);
 $username= Session::get('username');
//$validator = Validator::make(Input::all(), User::$rules);
         // if ($validator->passes()){
               $user = new User();
               $user->mobile = Input::get('mobile');
               $user->name = Input::get('name');
               $user->email = Input::get('email');
               $user->password = Hash::make(Input::get('password'));
               $user->save();

              // Response::json(null);
         // } else {
           //    Response::json(['message' => '注册失败'], 410);
          //}
      }
}
