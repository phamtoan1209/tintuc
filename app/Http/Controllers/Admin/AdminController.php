<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Post;
use App\Model\Category;
use App\Model\Admin;
use App\Model\Support;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data['categorys'] = Category::count();
        $data['posts'] = Post::count();
        $data['postOff'] = Post::where('status' ,Post::STATUS_OFF)->count();
        $data['products'] = Product::count();
        $data['productOff'] = Product::where('status' ,Product::STATUS_OFF)->count();
        $data['admins'] = Admin::count();
        $data['supports'] = Support::count();
        return view('admin.index',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function exampleList(){
        return view('admin.example.list');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function exampleCreateOrUpdate(){
        return view('admin.example.create_update');
    }

}
