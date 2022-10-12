<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $products = Product::where('visibility', '=', 1)->with('categories')->orderBy('product_name', 'asc')->paginate(6);

        // return response json 
        return response()->json([
            'products' => $products,
            'success' => true
        ]);
    }


    public function showProductsMostOrder()
    {
        // products most order
        $products_most_order = Product::select([
            'products.*',
            DB::raw('SUM(order_product.quantity) as total_sales'),
        ])
            ->join('order_product', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->where('orders.status', 1)
            ->groupBy('products.id')
            ->orderByDesc('total_sales')
            ->limit(6)
            ->get();


        // return response json
        return response()->json([
            'products_most_order' => $products_most_order,
            'success' => true
        ]);
    }

    public function showProduct($id)
    {
        // product 
        $product = Product::where('id', '=', $id)->get();

        // return response json
        return response()->json([
            'product' => $product,
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
