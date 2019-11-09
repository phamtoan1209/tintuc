<?php

namespace App\Http\Controllers\Admin;

use App\Model\RoleAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Role;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
class ManageAdminController extends Controller
{
    protected $lastPrefix;

    protected $model;

    protected $role;

    protected $roleAdmin;

    protected $list;

    protected $createUpdate;

    /**
     * ManageAdminController constructor.
     * @param Admin $model
     * @param Role $role
     * @param RoleAdmin $roleAdmin
     */
    public function __construct(Admin $model,Role $role, RoleAdmin $roleAdmin)
    {
        $prefix = explode('/',\Route::current()->getPrefix());
        $this->lastPrefix = end($prefix);
        $this->Model = $model;
        $this->role = $role;
        $this->roleAdmin = $roleAdmin;
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('actionBlock',$this->lastPrefix.'.block');
        view()->share('breadcrumb','Manage '.$this->lastPrefix);
        view()->share('modul','Admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $datas = $this->Model->getList();
        return view($this->list,compact('datas'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request, $id = null){
        if($request->isMethod('get')){
            if($id){
                $item = $this->Model->findOrFail($id);
                if($item->username == 'admin'){
                    return redirect()->route($this->lastPrefix.'.list')->with([
                        'alert_message' => Config::get('constants.SUPERADMIN_NOTUPDATE'),
                        'type_message' => 'danger',
                    ]);
                }
                $roles = $this->role->getAllRole();
                $roleOFAdmin= array_keys($item->roles());
                return view($this->createUpdate,compact('item','roles','roleOFAdmin'));
            }
            return view($this->createUpdate);
        }
        $request->validate([
            'fullname' => 'required|max:150',
            'username' => 'required|max:150|unique:'.$this->lastPrefix. ($id ? ",id,$id" : ''),
            'email' => 'required|email|max:191|unique:'.$this->lastPrefix. ($id ? ",id,$id" : ''),
            'password' => ($id ? 'nullable' : 'required' ).'|min:6|max:30|confirmed',
            'roles' => 'nullable|array',
        ]);
        $data = $request->only('fullname','username','email');
        if($request->has('password') && $request->input('password') != null){
            $data['password'] = Hash::make($request->input('password'));
        }
        $this->Model->updateOrCreate(['id' =>$id ],$data);
        $this->roleAdmin->deleteRoleAdmin($id);
        if($request->has('roles') && $id != null){
            $reqRole = $request->input('roles');
            foreach ($reqRole as $role){
                $relationship = [
                    'admin_id' => $id,
                    'role_id' => $role,
                ];
                $list[] = $relationship;
            }
            $this->roleAdmin->insert($list);
        }
        return redirect()->route($this->lastPrefix.'.list')->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $item = $this->Model->findOrFail($id);
        $item->delete();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.DELETE_SUCCESS'),
        ]);
    }

    public function block(Request $request, $id){
        $item = $this->Model->findOrFail($id);
        if($item->username == 'admin'){
            return redirect()->route($this->lastPrefix.'.list')->with([
                'alert_message' => Config::get('constants.SUPERADMIN_NOTDELETE'),
                'type_message' => 'danger',
            ]);
        }
        $item->is_block = $request->input('is_block');
        $item->save();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.'.( $item->is_block ? 'BLOCK_SUCCESS' : 'UNBLOCK_SUCCESS')),
        ]);
    }
}
