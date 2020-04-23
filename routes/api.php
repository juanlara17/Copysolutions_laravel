<?php

use Illuminate\Http\Request;

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

/***** Category *****/
Route::apiResource('category','API\CategoryController')->names('api.category');

/***** Product *****/
Route::apiResource('product','API\ProductController')->names('api.product');

/***** Delete Image Product *****/
Route::delete('/deleteimage/{id}', 'API\ProductController@deleteImage')->name('api.deleteimage');

/***** AutoComplete *****/
Route::get('/autocomplete', 'API\AutoCompleteController@autocomplete')->name('autocomplete');

/***** Store ********/

Route::apiResource('store', 'API\StoreController')->names('api.store');
