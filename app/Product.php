<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Sortable;

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

    // sortable table
    public $sortable = [
        'id', 'product_name', 'description', 'price', 'categories','visibility', 'user_id', 'created_at', 'updated_at',
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

    // relazione tabella orders
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot(['quantity']);
    }
}
