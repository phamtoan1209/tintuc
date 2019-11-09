<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
    protected $table = 'role_admins';
    protected $fillable = ['admin_id','role_id'];

    /**
     * @param $admin_id
     * @return mixed
     */
    public function deleteRoleAdmin($admin_id){
        return $this->where('admin_id',$admin_id)->delete();
    }
}
