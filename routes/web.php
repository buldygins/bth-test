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

Route::resource('product','ProductController')->except(['index','show']);

Route::name('product.')->group(function (){
    Route::get('/', 'ProductController@index')->name('index');

    Route::get('/products/unavailable', 'ProductController@listUnavailable')->name('unavailable_list');

    Route::get('/products/deleted', 'ProductController@listDeleted')->name('deleted_list');

    Route::post('/product/{product}/restore','ProductController@restore')->name('restore');
});


