<?php

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// Middleware auth role user
Route::middleware(['auth' ,'role:user'])->namespace('User')->prefix('user')->name('user.')->group(function () {

    // Rotta home
    Route::get('/home', 'HomeController@index')->name('home');
});

// Middleware auth  role superadminstrator
Route::middleware(['auth' , 'role:superadministrator'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // Rotta home
    Route::get('/home', 'HomeController@index')->name('home');

    // Rotta users
    Route::resource('/users', 'UserController');

    // Rotta resource categories
    Route::resource('/categories', 'CategoryController');

    // Rotta resource products
    Route::resource('/products', 'ProductController');

    // Rotta resource orders
    Route::resource('/orders', 'OrderController');
});

// middleware auth 
Route::middleware('auth')->group(function() {

    // rotta credit card
    Route::get('/credit-card', 'Auth\StripeController@creditCard');

    // Rotta make payment
    Route::post('/make-payment', 'Auth\StripeController@afterPayment')->name('make.payment');

    // rotta payment success
    Route::get('/payment-success', 'Auth\StripeController@success');
});

// Creo una rotta di fallback che restiturà guest.home view
route::get('{any}', function () {
    return view('guest.home');
})->where('any', '.*');


