<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Facades\Config;
use App\Model\ProductDetail;
use App\Model\ProductImage;

class ProductController extends BaseController
{
    protected $model;
    protected $category;
    protected $pathUpload;
    protected $detail;
    protected $image;

    public function __construct(Product $model, Category $category,ProductDetail $detail,ProductImage $image)
    {
        $this->lastPrefix = $this->getLastPrefix();
        $this->Model = $model;
        $this->category = $category;
        $this->detail = $detail;
        $this->image = $image;
        $this->pathUpload = 'products';

        // routes in controller
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';

        // variables share to view
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.update');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('actionStatus',$this->lastPrefix.'.status');
        view()->share('actionAddDetail',$this->lastPrefix.'.adddetail');
        view()->share('actionDelDetail',$this->lastPrefix.'.deldetail');
        view()->share('actionAddImage',$this->lastPrefix.'.addimage');
        view()->share('actionDelImage',$this->lastPrefix.'.delimage');
        view()->share('breadcrumb','sản phẩm');
        view()->share('modul',$this->pathUpload);
        view()->share('statusOff',Product::STATUS_OFF);
        view()->share('statusOn',Product::STATUS_ON);
        view()->share('selectCategory',Category::getAllCategoryProduct());
    }

    public function index(Request $request){
        $filter = $request->all();
        $datas = $this->Model->getList($filter);
        return view($this->list,compact('datas','filter'));
    }

    public function create(Request $request, $id = null){
        if($request->isMethod('get')){
            if($id){
                $item = $this->Model->with(['details','images'])->findOrFail($id);
                return view($this->createUpdate,compact('item'));
            }
            return view($this->createUpdate);
        }
        $request->validate([
            'name' => 'required|unique:'.$this->lastPrefix. ($id ? ",id,$id" : ''),
            'category_id' => 'required',
        ]);
        $data = $request->only('name','content','category_id','hot','admin_id','description','title_seo','description_seo','keyword_seo');
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $data['large'] = $this->uploadFile($file,$this->pathUpload,true, 400,400);
            $data['thumb'] = $this->getUrlImgThumb($data['large'],$this->pathUpload);
        }
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['hot'] = $request->has('hot') ? 1 : 0;
        $data['slug'] = str_slug($data['name']);
        $this->Model->updateOrCreate(['id' =>$id ],$data);
        return redirect()->route($this->lastPrefix.'.list')->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }

    public function delete($id){
        $item = $this->Model->findOrFail($id);
        $item->delete();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.DELETE_SUCCESS'),
        ]);
    }

    public function status($id){
        $item = $this->Model->findOrFail($id);
        if($item->status == Product::STATUS_ON){
            $item->status = Product::STATUS_OFF;
        }else{
            $item->status = Product::STATUS_ON;
        }
        $item->save();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
        ]);
    }

    public function addDetail(Request $request,$productId){
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);
        $data = $request->only('name','value');
        $data['product_id'] = $productId;
        $this->detail->insert($data);
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.ADD_SUCCESS'),
        ]);
    }

    public function delDetail($id){
        $item = $this->detail->findOrFail($id);
        $item->delete();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.DELETE_SUCCESS'),
        ]);
    }

    public function addImage(Request $request, $productId){
        $request->validate([
            'thumb' => 'required',
        ]);
        if($request->has('thumb')){
            $files = $request->file('thumb');
            foreach ($files as $image){
                $data['product_id'] = $productId;
                $data['large'] = $this->uploadFile($image,'product_images',true,'130','130');
                $data['thumb'] = $this->getUrlImgThumb($data['large'],'product_images');
                $this->image->insert($data);
            }
            return redirect()->back()->with([
                'alert_message' => Config::get('constants.UPDATE_SUCCESS'),
            ]);
        }
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.ERROR'),
        ]);
    }

    public function delImage($id){
        $item = $this->image->findOrFail($id);
        $item->delete();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.DELETE_SUCCESS'),
        ]);
    }



}
