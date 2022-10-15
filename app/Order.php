<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use Sortable;

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot(['quantity']);
    }

    protected $fillable = [
        'user_name',
        'user_surname',
        'user_city',
        'user_address'
    ];

    // sortable table
    public $sortable = [
        'id', 'user_name', 'user_surname', 'user_city', 'user_address', 'user_email', 'user_id', 'total_price', 'status', 'created_at', 'updated_at'
    ];
}
