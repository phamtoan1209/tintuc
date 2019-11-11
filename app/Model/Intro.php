<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $table = 'intros';

    protected $fillable = ['id','content','name','link'];

    public static function getAllPage(){
        return self::all()->pluck('name','link')->toArray();
    }

}
