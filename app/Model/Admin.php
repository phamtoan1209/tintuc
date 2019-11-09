<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'is_active', 'is_block','avatar'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return array
     */
    public function roles(){
        return $this->belongsToMany('App\Model\Role','role_admins','admin_id','role_id')->select('id','access')->pluck('access','id')->toArray();
    }

    /**
     * @param $value
     * @return string
     */
    public function getAvatarAttribute($value){
        return ($value != null)? $value : 'images/icon-user-default.png';
    }

    /**
     * @return mixed
     */
    public function getList(){
        return $this->paginate(10);
    }

}
