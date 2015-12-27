<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Log;
class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;
	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	    {
	    	$mpath=$request->path();
	        	if ($this->auth->check()) {
	        	if ($request->ajax()){
			return response('Unauthorized.', 401);
		}
	        	  Log::error("lbg".$request->path());
		    $needle="login";
		    $pos = strpos($mpath, $needle);
		    if( $pos ){
		    	   return redirect('/member/index');
		    }else {
		    	$needle="index";
		    $pos = strpos($mpath, $needle);
		    	if($pos){
    				 return $next($request);
		    	}else{
		    	 	return redirect()->back();
		    	}
		    }
	            //我一般使用这个，成功后登录我想使用的控制器
	            return redirect()->action('ArticleController@index');
	       }else{

		$urls= array('login','register'); 
		$iscontains=false;
		  foreach ($urls as $url){ 
		        if (strpos($mpath, $url)) {
				    $iscontains = true;
				    break;
				}
		    } 
		    if( $iscontains ){
		    	    Log::error("lbgnext");
		    	 return $next($request);
		    }else {
		    Log::error("lbg".$request->path());
	        	  return redirect('/auth/login');
	        	}
	        }

	        return $next($request);
	    }
}
