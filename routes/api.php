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

Route::group(['middleware'=>'cors'], function (){
    Route::prefix('v1')
        ->namespace('Api\V1')
        ->group(function () {

            Route::get('/buscarCep', 'AddressesController@buscarCep');

            Route::resource('/products', 'ProductsController',['except' => ['edit', 'create']]);
            Route::resource('/categories', 'CategoriesController',['except' => ['edit', 'create','show']]);
            Route::resource('/sale_orders', 'SaleOrdersController',['except' => ['edit', 'create','show']]);
        });
});