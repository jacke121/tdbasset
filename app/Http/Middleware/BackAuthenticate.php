<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Log;
use Config;
use Auth;
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

		 $this->auth = Auth::user();//$auth;
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
	        if ( $this->auth->check()) {
		    	return $next($request);
	        }else{
				Log::error("auth->check failed");
	        	$urls= array("login","register","checkUser","home"); 
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
				Log::error("auth->check failed goto login");
	        	  return redirect('/backend/auth/login');
	        	}
	        	  // return redirect()->guest('/backend/login');
	        }

	        return $next($request);
	    }
}
