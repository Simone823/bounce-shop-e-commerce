<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // fillable
    protected $fillable = [
        'product_name',
        'slug',
        'description',
        'price',
        'visibility',
        'image'
    ];
}
