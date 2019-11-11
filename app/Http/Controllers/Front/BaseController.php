<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Information;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->renderSeo();
    }

    public function renderSeo($item = null)
    {
        $website = Information::getInfor();
        $arrSeo = [];
        $arrSeo['title_seo'] = isset($item) && isset($item->title_seo) ? $item->title_seo : $website['title_seo'];
        $arrSeo['description_seo'] = isset($item) && isset($item->description_seo) ? $item->description_seo : $website['description_seo'];
        $arrSeo['keyword_seo'] = isset($item) && isset($item->keyword_seo) ? $item->keyword_seo : $website['keyword_seo'];
        view()->share('arrSeo',$arrSeo);
    }
}
