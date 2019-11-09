<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Support extends Model
{

    const PAGE_ITEM = 10;

    public $table = 'supports';

    public $fillable = ['id','name','avatar','phone','facebook'];

    public function getList($filter = []){
        $query = $this->select($this->fillable);
        if(isset($filter['name']) && $filter['name'] != ''){
            $query->where('name','like','%'.$filter['name'].'%');
            $query->orWhere('phone','like','%'.$filter['name'].'%');
        }
        return $query->orderBy('id','DESC')->get();
    }


}
