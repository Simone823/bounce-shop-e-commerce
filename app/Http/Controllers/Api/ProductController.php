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

    public function showProducts()
    {
        // products
        $products = Product::where('visibility', '=', 1)->orderBy('product_name', 'asc')->paginate(6);

        // return response json 
        return response()->json([
            'products' => $products,
            'success' => true
        ]);
    }


    public function showLatestProducts()
    {
        // latest products
        $latest_products = Product::where('visibility', '=', 1)->orderBy('created_at', 'desc')->limit(3)->get();

        // return response json
        return response()->json([
            'latest_products' => $latest_products,
            'success' => true
        ]);
    }

    public function showCategory($id) 
    {
        // products
        $products = Product::join('category_product', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'category_product.category_id')
            ->where('category_product.category_id', '=', $id)
            ->where('products.visibility', '=', 1)
            ->orderBy('product_name', 'asc')
            ->paginate(6);

        // return response json
        return response()->json([
            'products' => $products,
            'success' => true
        ]);
    }
}
