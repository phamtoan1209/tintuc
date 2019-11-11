<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Product extends Model
{

    const PAGE_ITEM = 10;
    const PAGE_ITEM_FRONT = 10;
    const STATUS_ON = 1;
    const STATUS_OFF = 0;

    public $table = 'products';

    public $fillable = ['id','admin_id','thumb','name','slug','content','status','category_id','views','created_at','description','hot','large','title_seo','description_seo','keyword_seo'];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function getList($filter = [],$limit = self::PAGE_ITEM){
        $query = $this->select($this->fillable)->with('category');
        if(isset($filter['name']) && $filter['name'] != ''){
            $query->where('name','like','%'.$filter['name'].'%');
        }
        if(isset($filter['status'])){
            $query->where('status',(int)$filter['status']);
        }
        if(isset($filter['hot'])){
            $query->where('hot',(int)$filter['hot']);
        }
        if(isset($filter['category_id'])){
            if(is_array($filter['category_id'])){
                $query->whereIn('category_id',$filter['category_id']);
            }else{
                $query->where('category_id',$filter['category_id']);
            }
        }
        return $query->orderBy('id','DESC')->paginate($limit);
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class,'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function getListForFront($orderBy = true,$filter = [],$limit = self::PAGE_ITEM_FRONT){
        $query = $this->select($this->fillable)->where('status',self::STATUS_ON)->with('category');
        if(isset($filter['name']) && $filter['name'] != ''){
            $query->where('name','like','%'.$filter['name'].'%');
        }
        if(isset($filter['hot']) && $filter['hot'] != ''){
            $query->where('hot',$filter['hot']);
        }
        if(isset($filter['category_id']) && $filter['category_id'] != ''){
            if(is_array($filter['category_id'])){
                $query->whereIn('category_id',$filter['category_id']);
            }else{
                $query->where('category_id',$filter['category_id']);
            }
        }
        if($orderBy){
            $query->orderBy('id','DESC');
        }
        return $query->paginate($limit);
    }

    public static function getProductSame($id,$categoryId){
        $arrCate = Category::getAllIdsRelation($categoryId);
        return static::where('id','<>',$id)->where('status',self::STATUS_ON)->whereIn('category_id',$arrCate)->orderBy('id','DESC')->take(4)->get();
    }
}
