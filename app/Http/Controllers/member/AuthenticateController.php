<?php namespace App\Http\Controllers\member;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Response;
use Illuminate\Http\Request;
class AuthenticateController extends Controller {

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth =Auth::member();// $auth;
		$this->loginPath = '/auth/login';
		$this->redirectAfterLogout = url('/auth/login');
	}
	     public function show(Request $request)//见明之意，就是提交请求到login方法，
	        {
	          return view('member.authenticate');
	        }
     public function Authenticate(Request $request)//见明之意，就是提交请求到login方法，
        {
          return view('auth.login');
        }
}
