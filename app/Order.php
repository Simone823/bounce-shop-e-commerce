<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    protected $fillable = [
        'user_name',
        'user_surname',
        'user_city',
        'user_address'
    ];
}
