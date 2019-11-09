<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\Model\Post;
use App\Model\Category;
use Illuminate\Support\Facades\Config;

class PostController extends BaseController
{
    protected $model;
    protected $category;
    protected $pathUpload;

    public function __construct(Post $model, Category $category)
    {
        $prefix = explode('/',\Route::current()->getPrefix());
        $this->lastPrefix = end($prefix);
        $this->Model = $model;
        $this->category = $category;
        $this->pathUpload = 'posts';

        // routes in controller
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';

        // variables share to view
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('actionStatus',$this->lastPrefix.'.status');
        view()->share('breadcrumb','tin tức');
        view()->share('modul',$this->pathUpload);
        view()->share('statusOff',Post::STATUS_OFF);
        view()->share('statusOn',Post::STATUS_ON);
        view()->share('selectCategory',Category::getAllCategoryPost());
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
            'name' => 'required|unique:'.$this->lastPrefix. ($id ? ",id,$id" : ''),
            'category_id' => 'required',
        ]);
        $data = $request->only('name','content','category_id','hot','admin_id','description','large','title_seo','description_seo','keyword_seo');
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $data['large'] = $this->uploadFile($file,$this->pathUpload,true, 400,350);
            $data['thumb'] = $this->getUrlImgThumb($data['large'],$this->pathUpload);
        }
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['slug'] = str_slug($data['name']);
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
