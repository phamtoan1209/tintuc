<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    const STATUS_READ = 1;
    const STATUS_UNREAD = 0;
    const PAGE_ITEM = 10;

    protected $table = 'contacts';

    protected $fillable = ['id','name','phone','email','content','status'];

    public function getList($filter = [],$limit = self::PAGE_ITEM){
        $query = $this->select($this->fillable);
        if(isset($filter['status']) && $filter['status'] != ''){
            $query->where('status',$filter['status']);
        }
        if(isset($filter['text']) && $filter['text'] != ''){
            $query->where('email','like','%'.$filter['text'].'%')
                ->orWhere('phone','like','%'.$filter['text'].'%')
                ->orWhere('name','like','%'.$filter['text'].'%');
        }
        return $query->orderBy('id','DESC')->paginate($limit);
    }
}
