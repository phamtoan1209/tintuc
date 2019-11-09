<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_detail';
    protected $fillable = ['name','value'];
}
