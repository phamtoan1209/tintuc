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
    protected $Intro;

    public function __construct(Product $product,Post $post,Category $category,Intro $intro)
    {
        parent::__construct();
        $this->Product = $product;
        $this->Post = $post;
        $this->Category = $category;
        $this->Intro = $intro;
    }

    public function index(){
        $data['products'] = $this->Product->getListForFront(true,['hot' => 1],12);
        $data['posts'] = $this->Post->getListForFront(true,[],12);
        return view('front.index',$data);
    }

    public function allProduct(Request $request,$slug = null){
        $filter = $request->all();
        $cate = null;
        if($slug != null){
            $cate = $this->Category->with('parent')->where('slug',$slug)->first();
            if($cate){
                $this->renderSeo($cate);
                $filter['category_id'] = Category::getAllIdsRelation($cate->id);
            }
        }else{
            view()->share(['arrSeo' => [
                'title_seo' => 'Danh sách sản phẩm',
                'description_seo' => 'Danh sách sản phẩm',
                'keyword_seo' => 'Danh sách sản phẩm',
            ]]);
        }
        $data['filter'] = $filter;
        $data['cate'] = $cate;
        $data['products'] = $this->Product->getListForFront(true,$filter,16);
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
        $filter = $request->all();
        $cate = null;
        if($slug != null){
            $cate = $this->Category->where('slug',$slug)->first();
            if($cate){
                $this->renderSeo($cate);
                $filter['category_id'] = Category::getAllIdsRelation($cate->id);
            }
        }else{
            view()->share(['arrSeo' => [
                'title_seo' => 'Danh sách tin tức',
                'description_seo' => 'Danh sách tin tức',
                'keyword_seo' => 'Danh sách tin tức',
            ]]);
        }
        $data['cate'] = $cate;
        $data['filter'] = $filter;
        $data['posts'] = $this->Post->getListForFront(true,$filter,12);
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

    public function allCategory(Request $request,$slug = null,$slugsub = null,$slugsub2 = null){
        $slug = isset($slug) && $slug != '' ? $slug : '';
        $slug = isset($slugsub) && $slugsub != '' ? $slugsub : $slug;
        $slug = isset($slugsub2) && $slugsub2 != '' ? $slugsub2 : $slug;
        if($slug != ''){
            $cate = $this->Category->with('parent')->where('slug',$slug)->first();
            if($cate){
                $this->renderSeo($cate);
                $filter['category_id'] = Category::getAllIdsRelation($cate->id);
                $data['filter'] = $filter;
                $data['cate'] = $cate;
                if($cate->type == Category::TYPE_PRODUCT){
                    $data['products'] = $this->Product->getListForFront(true,$filter,16);
                    return view('front.product.list',$data);
                }
                $data['posts'] = $this->Post->getListForFront(true,$filter,12);
                return view('front.post.list',$data);
            }
            return redirect(route('errorPage'));
        }
        return redirect(route('errorPage'));
    }

    public function contact(Request $request){
        $menu = 'contact';
        return view('front.contact',compact('menu'));
    }

    public function addContact(Request $request){
        $params = $request->post();
        if(isset($params['name']) && isset($params['email']) && isset($params['phone'])){
            $contact = new Contact($request->only('name','phone','email','content'));
            $contact->save();
//            $account_mail = Information::where('key','account_mail')->first();
//            $mailTo = $account_mail->value != '' ? $account_mail->value : 'phamtoan12091994@gmail.com';
//            Mail::send('front.mail.email', array('name'=>$contact->name,'phone' => $contact->phone,'email'=>$contact->email, 'content'=>$contact->content), function($message) use ($mailTo){
//                $message->to($mailTo, 'Quản trị')->subject('Người dùng liên hệ!');
//            });
        }else if(isset($params['text'])){
            $str = 'Không xác định';
            $contact = new Contact();
            $fieldSet = strpos($params['text'],'@') != false ? 'email' : 'phone';
            $fieldLeft = $fieldSet == 'email' ? 'phone' : 'email';
            $contact->{$fieldSet} = $params['text'];
            $contact->{$fieldLeft} = $str;
            $contact->name = $str;
            $contact->content = $str;
            $contact->save();
        }
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.CONTACT_SUCCESS'),
        ]);
    }

    public function intro(Request $request){
        $menu = 'intro';
        $intro = Intro::first();
        return view('front.intro',compact('intro','menu'));
    }

    public function getPage($slug = null){
        if($slug != null){
            $page = $this->Intro->where('link',$slug)->first();
            if($page){
                return view('front.single_page',['page' => $page]);
            }
        }
        return view('errors.404');
    }

    public function errorPage(){
        return view('errors.404');
    }

}
