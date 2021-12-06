<?php

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

Route::get('/',"PagesController@getCategories");
Route::get('{cat_url}',"PagesController@showCatProducts");
Route::get('product/{product_url}',"PagesController@showProduct");




Route::prefix('shop')->group(function () {
    Route::get('add-to-cart',"ShopController@addToCart");
    Route::get('update-cart',"ShopController@updateCart");
    Route::get('remove-product/{id}',"ShopController@removeProduct");
    Route::get('deleteCart',"ShopController@deleteCart");
    Route::get('saveOrder',"ShopController@saveOrder");
    Route::get('cart',function(){return view('cart');});
});

Route::prefix('user')->group(function () {
     Route::get('signin',function(){return view('signin');});
     Route::post('signin',"UserController@signIn");
});





//Route::get('users',[UserController::class, 'getUsers']);

Route::get('user',"UserController@getUsers");