<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showCategories()
    {
        // categories
        $categories = Category::orderBy('category_name', 'asc')->get();

        // return response json
        return response()->json([
            'categories' => $categories,
            'success' => true
        ]);
    }

    
    public function topCategories()
    {
        // categories
        $top_categories = Category::orderBy('category_name', 'asc')->limit(4)->get();

        // return rsponse json
        return response()->json([
            'top_categories' => $top_categories,
            'success' => true, 
        ]);
    }
}
