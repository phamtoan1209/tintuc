<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->renderSeo();
    }

    public function renderSeo($item = null)
    {
        $arrSeo = [];
        $arrSeo['title_seo'] = isset($item) && isset($item->title_seo) ? $item->title_seo : Config::get('webinfos.TITLE_SEO');
        $arrSeo['description_seo'] = isset($item) && isset($item->description_seo) ? $item->description_seo : Config::get('webinfos.DESCRIPTION_SEO');
        $arrSeo['keyword_seo'] = isset($item) && isset($item->keyword_seo) ? $item->keyword_seo : Config::get('webinfos.KEYWORD_SEO');
        view()->share('arrSeo',$arrSeo);
    }
}
