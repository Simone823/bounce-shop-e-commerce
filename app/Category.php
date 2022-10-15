<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;

    // fillable
    protected $fillable = [
        'category_name',
        'slug',
    ];

    // sortable table
    public $sortable = [
        'id', 'category_name', 'created_at', 'updated_at'
    ];

    // relazione products table
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
