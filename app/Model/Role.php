<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','access'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins(){
        return $this->belongsToMany('App\Model\Admin','role_admins','role_id','admin_id')->select('fullname')->pluck('fullname')->toArray();
    }

    public function getList(){
        return $this->paginate(10);
    }

    public function getAllRole(){
        return $this->select('id','name')->orderBy('created_at','ASC')->pluck('name','id')->toArray();
    }
}
