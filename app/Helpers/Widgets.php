<?php

namespace app\Helpers;

class Widgets {

    public static function getFormSeo($item = false){
        return view('widgets.form_seo',['item' => $item]);
    }

    public static function htmlSeo(){
        return view('widgets.html_seo');
    }

    public static function renderItemProduct($data = null){
        return view('widgets._item_product',['products' => $data]);
    }

    public static function renderItemPost($data = null){
        return view('widgets._item_post',['posts' => $data]);
    }

    public static function renderNavTab($data = null,$cate = null){
        return view('widgets._nav_tab',['categorys' => $data,'cate' => $cate]);
    }

    public static function renderBreadcumb($cate = null,$type = 'product'){
        return view('widgets._breadcumb',['cate' => $cate,'type' => $type]);
    }
}