<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    const STATUS_ON = 1;
    const STATUS_OFF = 0;

    public $table = 'slides';

    public $fillable = ['thumb','status'];

    public static function getSlideHome(){
        return static::where('status',self::STATUS_ON)->get();
    }
}
