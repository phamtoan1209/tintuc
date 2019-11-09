<?php

namespace App\Http\Controllers\Front;

use App\Model\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\BaseController;
use Illuminate\Support\Facades\Config;
use App\Model\Post;
use App\Model\Product;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Intro;
use Illuminate\Support\Facades\Mail;

class FrontController extends BaseController
{

    protected $Product;
    protected $Post;
    protected $Category;

    public function __construct(Product $product,Post $post,Category $category)
    {
        parent::__construct();
        $this->Product = $product;
        $this->Post = $post;
        $this->Category = $category;
    }

    public function index(){
        $data['menu'] = 'home';
        $cateProductHot = Category::getParentCategory('product',true,true);
        $listCates = [];
        if(!empty($cateProductHot)){
            foreach ($cateProductHot as $item){
                $filter['category_id'] =  Category::getAllIdsRelation($item['id']);
                $item['products'] = $this->Product->getListForFront(true,$filter,9);
                $listCates[] = $item;
            }
        }
        $data['home'] = true;
        $data['categoryProductHot'] = $cateProductHot;
        $data['listCates'] = $listCates;
        return view('front.index',$data);
    }

    public function allProduct(Request $request,$slug = null){
        $data['menu'] = 'product';
        $filter = $request->all();
        $cate = null;
        if($slug != null){
            $cate = $this->Category->with('parent')->where('slug',$slug)->first();
            if($cate){
                $this->renderSeo($cate);
                $filter['category_id'] = Category::getAllIdsRelation($cate->id);
            }
        }
        $data['cate'] = $cate;
        $data['filter'] = $filter;
        $data['flagLinks'] = 1;
        $data['products'] = $this->Product->getListForFront(true,$filter,16);
        $data['categoryProduct'] = Category::getTreeCategoryHome('product');
        return view('front.product.list',$data);
    }

    public function detailProduct(Request $request,$slug){
        $data['menu'] = 'product';
        $data = [];
        $product = $this->Product->where('slug',$slug)->where('status',Product::STATUS_ON)->with(['category','details','images'])->first();
        if($product){
            $this->renderSeo($product);
            $product->views = $product->views + 1;
            $product->save();
            $data['product'] = $product;
            $data['products'] = Product::getProductSame($product->id,$product->category_id);
            return view('front.product.detail_product',$data);
        }
        return view('errors.404');
    }

    public function allPost(Request $request,$slug = null){
        $data['menu'] = 'post';
        $filter = $request->all();
        $cate = null;
        if($slug != null){
            $cate = $this->Category->where('slug',$slug)->first();
            if($cate){
                $this->renderSeo($cate);
                $filter['category_id'] = Category::getAllIdsRelation($cate->id);
            }
        }
        $data['cate'] = $cate;
        $data['filter'] = $filter;
        $data['posts'] = $this->Post->getListForFront(true,$filter,18);
        $data['categoryPost'] = Category::getTreeCategoryHome('post');
        return view('front.post.list',$data);
    }

    public function detailPost(Request $request,$slug){
        $data['menu'] = 'post';
        $post = $this->Post->where('slug',$slug)->with('category')->first();
        if($post){
            $this->renderSeo($post);
            $post->views = $post->views + 1;
            $post->save();
            $data['post'] = $post;
            $data['posts'] = Post::getPostSame($post->id,$post->category_id);
            $data['categoryPost'] = Category::getTreeCategoryHome('post');
            return view('front.post.detail_post',$data);
        }
        return view('errors.404');
    }

    public function contact(Request $request){
        $menu = 'contact';
        return view('front.contact',compact('menu'));
    }

    public function addContact(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);
        $contact = new Contact($request->only('name','phone','email','content'));
        $contact->save();
        $account_mail = Information::where('key','account_mail')->first();
        $mailTo = $account_mail->value != '' ? $account_mail->value : 'phamtoan12091994@gmail.com';
        Mail::send('front.mail.email', array('name'=>$contact->name,'phone' => $contact->phone,'email'=>$contact->email, 'content'=>$contact->content), function($message) use ($mailTo){
            $message->to($mailTo, 'Quản trị')->subject('Người dùng liên hệ!');
        });

        return redirect()->back()->with([
            'alert_message' => Config::get('constants.CONTACT_SUCCESS'),
        ]);
    }

    public function intro(Request $request){
        $menu = 'intro';
        $intro = Intro::first();
        return view('front.intro',compact('intro','menu'));
    }



}
