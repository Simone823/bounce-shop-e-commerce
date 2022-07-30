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
    public function index()
    {
        // categories
        $categories = Category::orderBy('category_name', 'asc')->limit(4)->get();

        // return rsponse json
        return response()->json([
            'categories' => $categories,
            'success' => true, 
        ]);
    }
}
