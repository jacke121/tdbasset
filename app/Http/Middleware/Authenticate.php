<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

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
	        if ($this->auth->check()) {
	            //跳转到／home页
	            return redirect('/home');
	            
	            //登录成功后跳转登录前的那页，但一般我不这么用根据情况使用
	            return redirect()->back();
	            
	            //我一般使用这个，成功后登录我想使用的控制器
	            return redirect()->action('ArticleController@index');
	        }

	        return $next($request);
	    }
	// public function handle($request, Closure $next)
	// {
	// 	if ($this->auth->guest())
	// 	{
	// 		if ($request->ajax())
	// 		{
	// 			return response('Unauthorized.', 401);
	// 		}
	// 		else
	// 		{
	// 			return redirect()->guest('auth/login');
	// 		}
	// 	}

	// 	return $next($request);
	// }

}
