<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
class RoleAccess
{

    protected $auth;
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
    public function handle($request, Closure $next, $role)
    {
        $roleCurrentAdmin = $this->auth->user()->roles();
        if(in_array('superadmin',$roleCurrentAdmin) || in_array($role,$roleCurrentAdmin)){
            return $next($request);
        }
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.ERROR_ACCESS'),
            'type_message' => 'danger'
        ]);
    }
}
