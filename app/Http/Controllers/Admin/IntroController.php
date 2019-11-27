<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Config;
use App\Model\Intro;

class IntroController extends BaseController
{
    protected $model;
    protected $list;

    public function __construct(Intro $model)
    {
        $this->lastPrefix = $this->getLastPrefix();
        $this->Model = $model;
        // routes in controller
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';

        // variables share to view
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('breadcrumb','trang tĩnh');
        view()->share('modul','intros');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $datas = $this->Model->paginate(50);
        return view($this->list,compact('datas'));
    }

    public function create(Request $request,$id = null){
        if($request->isMethod('get')){
            if($id){
                $item = $this->Model->findOrFail($id);
                return view($this->createUpdate,compact('item'));
            }
            return view($this->createUpdate);
        }
        $request->validate([
            'content' => 'required',
            'name' => 'required',
            'link' => 'required'
        ]);
        $datas = $request->only('content','name','link');
        $this->Model->updateOrCreate(['id' => $id],$datas);
        return redirect()->route($this->lastPrefix.'.list')->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }


    public function delete($id){
        $item = $this->Model->findOrFail($id);
        $item->delete();
        return redirect()->route($this->lastPrefix.'.list')->with([
            'alert_message' => Config::get('constants.DELETE_SUCCESS'),
        ]);
    }


}
