<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class BaseController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Auth::guard('admin');
    }

    public function uploadFile($file,$path,$createThumb = false,$width = 200,$height = 200){
        $path = 'uploads/'.$path;
        $publicPath = public_path($path);
        $pathThumb = $path.'/thumb';
        $publicPathThumb = public_path($pathThumb);
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }
        $name = time()."_".substr(base64_encode(mt_rand()), 0, 10)."_".$file->getClientOriginalName();
        $file->move(public_path($path),$name);
        if($createThumb){
            if (!file_exists($publicPathThumb)) {
                mkdir($publicPathThumb, 0777, true);
            }
            $nameThumb = $pathThumb.'/'.$name;
            Image::make(public_path($path).'/'.$name)->fit($width, $height)->save(public_path($nameThumb),100);
        }
        return $path.'/'.$name;
    }

    public function getUrlImgThumb($url_large,$path){
        return str_replace('/'.$path.'/','/'.$path.'/thumb/',$url_large);
    }

    public function getLastPrefix(){
        $route = explode('/',\Route::current()->getPrefix());
        return end($route);
    }
}
