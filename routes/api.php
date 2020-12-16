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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');
    Route::get('college', 'API\ConfigController@getAllCollegeName');
    Route::post('college', 'API\ConfigController@storeCollegeName');
    Route::get('category', 'API\CategoryController@getAllCategoryName');
    Route::post('category', 'API\CategoryController@storeCategoryName');
    Route::put('category/{id}', 'API\CategoryController@update');
    Route::delete('category/{id}', 'API\CategoryController@destroy');
    Route::get('product', 'API\ProductController@getAllProductName');
    Route::post('product', 'API\ProductController@storeProductName');
    Route::get('product1', 'API\ProductController@index');
    Route::get('product2', 'API\ProductController@create');
    Route::post('product3', 'API\ProductController@product');
    Route::post('productvar', 'API\ProductVariationController@store');
    Route::get('productvar', 'API\ProductVariationController@getAllVariationName');
    Route::post('wishlist', 'API\WishlistController@store');
    Route::get('wishlist', 'API\WishlistController@getAllWishlistName');
   
   
    Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
   

   
    });