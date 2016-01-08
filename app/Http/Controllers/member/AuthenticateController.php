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
class AuthenticateController extends Controller {

	/**
	 * Create a new authentication controller instance.
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
	     public function getIndex(Request $request){
	          return view('member.index.authelayer',['type'=>"index"]);
	        }
	        public function getAuthelayer(Request $request){
	          return view('member.index.authelayer',['type'=>"repeat"]);
	        }
	        public function postAuthelayer(Request $request){
                Log::error('postAuthelayer:'.$request->get('itemname'));
                $file  =$request->file('file');
                $allowed_extensions = ["png", "jpg", "gif"];
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    return ['error' => 'You may only upload png, jpg or gif.'];
                }
                $destinationPath = '/uploads/images/layer/';
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(10).'.'.$extension;
                $file->move($destinationPath, $fileName);
	        	   // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
	               $member = new Member();
	               $member->id= $this->auth->get()->id;
	               $member->type =1;
                $member->roletype =$request->get('roletype');
                $member->cardnourl = $destinationPath.$fileName;
	               $member->itemname =$request->get('itemname');
                      	$member->email =$request->get('email');
                            	$member->no =$request->get('cardno');
                              $member->updatememberInfo($member->id,$member);
                   return parent::returnJson(0,"提交成功");
	        }
	        public function getAutheperson(Request $request)//见明之意，就是提交请求到login方法，
	        {
	        return view('member.index.autheperson');
	        }
	           public function postAutheperson(Request $request){
	        	   // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
	               $member = new Member();
	               $member->id= $this->auth->get()->id;
	               $member->type =2;
                   $member->roletype =$request->get('roletype');
	               $member->itemname =$request->get('itemname');
                      	$member->email =$request->get('email');
                            	$member->no =$request->get('no');
                              $member->updatememberInfo($member->id,$member);
                   return parent::returnJson(0,"提交成功");
	        }
	         public function getAuthecompany(Request $request)//见明之意，就是提交请求到login方法，
	        {
	      	return view('member.index.authecompany');
	        }
	           public function postAuthecompany(Request $request){

	        	   // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
	               $member = new Member();
	               $member->id= $this->auth->get()->id;
	               $member->type =3;
                   $member->roletype =$request->get('roletype');
	               $member->itemname =$request->get('itemname');
                   $member->email =$request->get('email');
                   $member->no =$request->get('no');
                     $member->updatememberInfo($member->id,$member);
                   return parent::returnJson(0,"提交成功");
	        }
}
