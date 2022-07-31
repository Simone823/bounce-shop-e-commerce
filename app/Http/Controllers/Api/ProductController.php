<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // products
        $products = Product::orderBy('created_at', 'desc')->limit(3)->get();

        // return response json
        return response()->json([
            'products' => $products,
            'success' => true
        ]);
    }
}
