<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    protected $fillable = ['name','key','value'];

    public static function getInfor(){
        return static::where('key','<>','account_mail')->pluck('value','key')->toArray();
    }

}
