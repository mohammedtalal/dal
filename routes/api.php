<?php

use App\Category;
use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('dalil', 'Api\CategoriesApiController@getAll');
Route::get('dalil/images/{imageName}','Api\CategoriesApiController@downloadImage');

