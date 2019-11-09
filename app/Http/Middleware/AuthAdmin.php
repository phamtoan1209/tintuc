<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{

    protected $auth;

    /**
     * AuthAdmin constructor.
     */
    public function __construct()
    {
        $this->auth = Auth::guard('admin');
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
        if($this->auth->check()){
            $currentAdmin = $this->auth->user();
            view()->share('currentAdmin',$currentAdmin);
            return $next($request);
        }
        return redirect()->route('adminLogin');
    }
}
