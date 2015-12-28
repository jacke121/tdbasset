<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Log;
class BackAuthenticate {

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
	    	Log::error("handle-1111".$mpath);
	        if ($this->auth->check()) {
	        	Log::error("handle-333".$mpath);
	            //跳转到／home页
	            return redirect('/home');
	            
	            //登录成功后跳转登录前的那页，但一般我不这么用根据情况使用
	            return redirect()->back();
	            
	            //我一般使用这个，成功后登录我想使用的控制器
	            return redirect()->guest('/backend/auth/login');
	            // return redirect()->action('ArticleController@index');
	        }else{
	        	$urls= array("login","register","checkUser"); 
		$iscontains=false;
		  foreach ($urls as $url){ 
		        if (strpos($mpath, $url)) {
				$iscontains = true;
				break;
			}
		    } 
		    if( $iscontains ){
		    	Log::error("handle-222-next");
		    	return $next($request);
		    }else {
	        	  return redirect('/backend/auth/login');
	        	}
	        	  // return redirect()->guest('/backend/login');
	        }

	        return $next($request);
	    }
	// public function handle($request, Closure $next)
	// {
	//  if ($this->backauth->guest())
	// 	{
	// 		if ($request->ajax())
	// 		{
	// 			return response('Unauthorized.', 401);
	// 		}
	// 		else
	// 		{
	// 			//return redirect()->guest('/backend/auth/login');
	// 			return redirect()->guest('/backend/auth/login');
	// 		}
	// 	}

	// 	return $next($request);
	// }

}
