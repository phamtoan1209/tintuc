<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Config;
use App\Model\Support;

class SupportController extends BaseController
{
    protected $model;
    protected $pathUpload;

    public function __construct(Support $model)
    {
        $prefix = explode('/',\Route::current()->getPrefix());
        $this->lastPrefix = end($prefix);
        $this->Model = $model;
        $this->pathUpload = 'supports';

        // routes in controller
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';

        // variables share to view
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('actionStatus',$this->lastPrefix.'.status');
        view()->share('breadcrumb','người hỗ trợ');
        view()->share('modul',$this->pathUpload);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $filter = $request->all();
        $datas = $this->Model->getList($filter);
        return view($this->list,compact('datas','filter'));
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
                return view($this->createUpdate,compact('item'));
            }
            return view($this->createUpdate);
        }
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->only('name','thumb','phone','facebook');
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $data['avatar'] = $this->uploadFile($file,$this->pathUpload);
        }
        $this->Model->updateOrCreate(['id' =>$id ],$data);
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

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($id){
        $item = $this->Model->findOrFail($id);
        if($item->status == Post::STATUS_ON){
            $item->status = Post::STATUS_OFF;
        }else{
            $item->status = Post::STATUS_ON;
        }
        $item->save();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }


}
