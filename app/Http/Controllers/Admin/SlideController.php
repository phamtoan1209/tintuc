<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Slide;
use Illuminate\Support\Facades\Config;

class SlideController extends BaseController
{

    protected $model;
    protected $pathUpload;

    public function __construct(Slide $model)
    {
        $prefix = explode('/',\Route::current()->getPrefix());
        $this->lastPrefix = end($prefix);
        $this->Model = $model;
        $this->pathUpload = 'slides';
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('actionStatus',$this->lastPrefix.'.status');
        view()->share('breadcrumb','slide');
        view()->share('modul',$this->pathUpload);
        view()->share('statusOn',Slide::STATUS_ON);
        view()->share('statusOff',Slide::STATUS_OFF);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $datas = $this->Model->get();
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
                return view($this->createUpdate,compact('item'));
            }
            return view($this->createUpdate);
        }
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $data['thumb'] = $this->uploadFile($file,$this->pathUpload,true,1467,500);
        }
        $data['status'] = 0;
        if($request->has('status')){
            $data['status'] = 1;
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
        if($item->status == Slide::STATUS_ON){
            $item->status = Slide::STATUS_OFF;
        }else{
            $item->status = Slide::STATUS_ON;
        }
        $item->save();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }

}
