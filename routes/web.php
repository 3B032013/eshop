<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Products',ProductController::class);
#products.index
#URL:Products | HTTP方法:GET|HEAD | 串接的控制器:ProductController@index

#products.show
#URL:Products/{Product} | HTTP方法:GET|HEAD | 串接的控制器:ProductController@show

#products.create
#URL:Products/create | HTTP方法:GET|HEAD | 串接的控制器:ProductController@create

#products.store
#URL:Products | HTTP方法:POST | 串接的控制器:ProductController@store

#products.edit
#URL:Products/{Product}/edit | HTTP方法:GET|HEAD | 串接的控制器:ProductController@edit

#products.update
#URL:Products/{Product} | HTTP方法:PUT|PATCH | 串接的控制器:ProductController@update

#products.destroy
#URL:Products/{Product} | HTTP方法:DELETE | 串接的控制器:ProductController@destroy
