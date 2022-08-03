<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route api
Route::namespace('Api')->group(function () {

    // Rotta categories
    Route::get('/categories', 'CategoryController@showCategories');
 
    // Rotta top categories
    Route::get('/top-categories', 'CategoryController@topCategories');

    // Rotta products
    Route::get('/products', 'ProductController@showProducts');

    // Rotta latest products
    Route::get('/latest-products', 'ProductController@showLatestProducts');

    // Rotta product show
    Route::get('/product-show/{id}', 'ProductController@showProduct');

    // Rotta category products category
    Route::get('/products-category/{category}', 'ProductController@showCategory');

    // Rotta message create
    Route::resource('/create-message', 'MessageController')->only('store');
});
