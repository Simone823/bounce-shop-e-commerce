<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // fillable
    protected $fillable = [
        'category_name',
        'slug',
    ];

    // relazione products table
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
