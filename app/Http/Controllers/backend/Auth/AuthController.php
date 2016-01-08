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

                  public function getRegister($type){
               // var_dump($type);
             return view('auth.register',['type'=>$type,'content'=>$type]);
             }
}
