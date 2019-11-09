<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    public $table = 'province';

    public $fillable = ['provinceid','name','type'];

    public static function getProvince(){
        return static::select('provinceid','name')->pluck('name','provinceid');
    }

}
