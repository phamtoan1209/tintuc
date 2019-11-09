<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const TYPE_POST = 1;
    const TYPE_PRODUCT = 0;
    const UNHOT = 0;
    const HOT = 1;
    const PAGE_ITEM = 10;

    public $table = 'categorys';

    public $fillable = ['id','name','slug','type','parent_id','description','hot','thumb','large','title_seo','description_seo','keyword_seo'];

    public static $selectArr = ['id','name','slug','type','parent_id','description','hot','thumb','large','title_seo','description_seo','keyword_seo'];

    public function getList($filter = [],$limit = self::PAGE_ITEM){
        $query = $this->select(['*'])->with('parent');
        if(isset($filter['name']) && $filter['name'] != ''){
            $query->where('name','like','%'.$filter['name'].'%');
        }
        if(isset($filter['type'])){
            $query->where('type',(int)$filter['type']);
        }
        if(isset($filter['hot'])){
            $query->where('hot',(int)$filter['hot']);
        }
        return $query->paginate($limit);
    }

    public function parent(){
        return $this->belongsTo('App\Model\Category','parent_id','id');
    }

    public static function getParentCategory($type = 'product',$hot = true,$full = true){
        $query = static::select(self::$selectArr)->where('parent_id',0);
        if($type == 'post'){
            $query->where('type',self::TYPE_POST);
        }else{
            $query->where('type',self::TYPE_PRODUCT);
        }
        if($hot){
            $query->where('hot',self::HOT);
        }
        if($full){
            return $query->get()->toArray();
        }
        return $query->pluck('name','id');
    }

    public static function getTreeCategoryHome($type = 'product',$hot = false){
        $data = self::getParentCategory($type,$hot,true);
        if(!empty($data)){
            $data = self::renderTreeCategory($data);
        }
        return $data;
    }


    public static function renderTreeCategory($data){
        $result = [];
        foreach ($data as $item){
            $item['childs'] = [];
            $categorys = static::select(self::$selectArr)->where('parent_id',$item['id'])->get()->toArray();
            if(!empty($categorys)){
                $item['childs'] = $categorys;
            }
            $result[] = $item;
        }
        return $result;
    }

    public static function getAllCategoryProduct(){
        return static::select('id','name')->where('type',self::TYPE_PRODUCT)->pluck('name','id');
    }

    public static function getAllCategoryPost(){
        return static::select('id','name')->where('type',self::TYPE_POST)->pluck('name','id');
    }

    public static function getAllIdsRelation($id){
        $arr = [$id];
        $childs = self::select('id')->where('parent_id',$id)->get()->pluck('id')->toArray();
        return array_merge($arr,$childs);
    }
}
