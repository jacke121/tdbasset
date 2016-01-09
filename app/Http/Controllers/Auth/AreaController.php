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
use Log;
use Hash;
use Auth;
use Validator;
use App\libs\common;
use App\libs\LbgCurl;
use anlutro\cURL\cURL;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AreaController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = Auth::member();// $auth;
        $this->registrar = $registrar;
        // $this->middleware('auth', ['except' => 'getLogout']);
    }

    public function getProvince(Request $request)//见明之意，就是提交请求到login方法，
    {
        $data = DB::select("select * from province");
        echo json_encode($data);
    }

    public function getCity(Request $request)//见明之意，就是提交请求到login方法，
    {
        $provinceid = $request->get("provinceid");
        $data = DB::select("SELECT * FROM city WHERE father='" . $provinceid . "'");
        echo json_encode($data);
    }
    public function getArea(Request $request)//见明之意，就是提交请求到login方法，
    {
        $cityid = $request->get("cityid");
        $data = DB::select("SELECT * FROM area WHERE father='" . $cityid . "'");
        echo json_encode($data);
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

    public function postSendsms(Request $request)
    {
        $mobile = Input::get('mobile');
        if (!preg_match("/1[3458]{1}\d{9}$/", $mobile)) {
            // if(!preg_match("/^13\d{9}$|^14\d{9}$|^15\d{9}$|^17\d{9}$|^18\d{9}$/",$mobile)){
            //手机号码格式不对
            return parent::returnJson(1, "手机号码格式不对" . $mobile);
        }

        $data = DB::select("select * from members where lifestatus=1 and mobile =" . $mobile);
        if (sizeof($data) > 0) {
            return parent::returnJson(1, "手机号已注册");
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
        // <State>1023</State>
        //  <MsgID>0</MsgID>
        //  <MsgState>无效计费条数,号码不规则,过滤[1:186019249011,]</MsgState>
        //  <Reserve>0</Reserve>

    }


}