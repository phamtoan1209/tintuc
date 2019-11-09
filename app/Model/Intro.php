<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $table = 'intros';

    protected $fillable = ['id','content','name','link'];

}
