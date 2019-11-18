<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\Model\Information;
use Illuminate\Support\Facades\Config;
class WebsiteController extends BaseController
{

    protected $model;
    protected $pathUpload;

    public function __construct(Information $model)
    {
        $prefix = explode('/',\Route::current()->getPrefix());
        $this->lastPrefix = end($prefix);
        $this->Model = $model;
        $this->pathUpload = 'informations';
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('breadcrumb','thông tin website');
        view()->share('modul','websites');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $datas = $this->Model->paginate(1000);
//        dd($datas);
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
        $request->validate([
            'value' => 'required'
        ]);
        $key = $request->post('key');
        if($key == 'logo' || $key == 'favicon'){
            if($request->hasFile('value')){
                $file = $request->file('value');
                if($key == 'logo'){
                    $data['value'] = $this->uploadFile($file,$key);
                }else{
                    $data['large'] = $this->uploadFile($file,$key,true,300,300);
                    $data['value'] = $this->getUrlImgThumb($data['large'],$key);
                }
            }
        }else{
            $data = $request->only('value');
        }
        $this->Model->updateOrCreate(['id' =>$id ],$data);

        return redirect()->route($this->lastPrefix.'.list')->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }



}
