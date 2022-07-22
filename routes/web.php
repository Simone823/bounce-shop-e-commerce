<?php

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

Route::get('/', function () {
    return view('welcome');
});

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
});


