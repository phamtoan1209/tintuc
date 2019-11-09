<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * @var mixed
     */
    protected $auth;

    /**
     * AuthController constructor.
     * @param Admin $admin
     */
    public function __construct()
    {
        $this->auth = Auth::guard('admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request){
        if($this->auth->check()){
            return redirect()->route('admin');
        }
        if($request->isMethod('get')){
            return view('admin.auth.login');
        }
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
        $request = $request->only(['username','password']);
        $credentials = [
            filter_var($request['username'],FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $request['username'],
            'password' => $request['password'],
            'is_block' => false
        ];
        if($this->auth->attempt($credentials)){
            return redirect()->route('admin');
        }else{
            return redirect()->route('adminLogin')->withErrors([
                'message' => Config::get('constants.LOGIN_FAIL')
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->auth->logout();
        return redirect()->route('adminLogin');
    }

    public function profile(Request $request){
        view()->share('breadcrumb','Your Profile');
        if($request->isMethod('get')){
            return view('admin.auth.profile');
        }
        $request->validate([
            'fullname' => 'required|max:150',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'nullable|min:6|confirmed'
        ]);

        $data = $request->only('fullname');
        if($request->has('password') && $request->input('password') != null){
            $data['password'] = Hash::make($request->input('password'));
        }
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time()."_".substr(base64_encode(mt_rand()), 0, 10).".".$file->getClientOriginalExtension();
            $file->move('public/uploads/admins',$name);
            $data['avatar'] = 'uploads/admins/'.$name;
        }
        $this->auth->user()->update($data);
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.UPDATE_PROFILE_SUCCESS')
        ]);
    }
}
