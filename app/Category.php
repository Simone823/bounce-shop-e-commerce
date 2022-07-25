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
}
