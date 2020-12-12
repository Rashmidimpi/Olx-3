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
    Route::put('category', 'API\CategoryController@update');
    Route::delete('category/{id}', 'API\CategoryController@destroy');
   
    Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
   

   
    });