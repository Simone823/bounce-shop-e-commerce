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
        'image',
        'user_id'
    ];

    // Funzione relazione tabella user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // relazione tablla categories
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
