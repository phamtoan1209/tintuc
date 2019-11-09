<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Store extends Model
{

    const PAGE_ITEM = 10;

    public $table = 'stores';

    public $fillable = ['name','address','phone','city'];

    public function getList($filter = [],$limit = self::PAGE_ITEM){
        $query = $this->select(['id','name','address','phone','city']);
        if(isset($filter['city'])){
            $query->where('city',(int)$filter['city']);
        }
        if(isset($filter['name']) && $filter['name'] != ''){
            $query->where('name','like','%'.$filter['name'].'%');
            $query->orWhere('phone','like','%'.$filter['name'].'%');
        }
        return $query->paginate($limit);
    }

}
