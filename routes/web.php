<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('cart_items',CartItemController::class);
    Route::resource('orders',OrderController::class);
});

require __DIR__.'/auth.php';

//Route::resource('products',ProductController::class)->only([
//    'index','show','store','update','destroy'
//]);

Route::get('products',[ProductController::class,'index'])->name("products.index");
Route::get('products/{product}',[ProductController::class,'show'])->name("products.show");
Route::get('products/create',[ProductController::class,'create'])->name("products.create");
Route::post('products',[ProductController::class,'store'])->name("products.store");
Route::get('products/{product}/edit',[ProductController::class,'edit'])->name("products.edit");
Route::patch('products/{product}',[ProductController::class,'update'])->name("products.update");
Route::delete('products/{product}',[ProductController::class,'destroy'])->name("products.destroy");

#products.index
#URL:products | HTTP方法:GET|HEAD | 串接的控制器:ProductController@index

#products.show
#URL:products/{product} | HTTP方法:GET|HEAD | 串接的控制器:ProductController@show

#products.create
#URL:products/create | HTTP方法:GET|HEAD | 串接的控制器:ProductController@create

#products.store
#URL:products | HTTP方法:POST | 串接的控制器:ProductController@store

#products.edit
#URL:products/{product}/edit | HTTP方法:GET|HEAD | 串接的控制器:ProductController@edit

#products.update
#URL:products/{product} | HTTP方法:PUT|PATCH | 串接的控制器:ProductController@update

#products.destroy
#URL:products/{product} | HTTP方法:DELETE | 串接的控制器:ProductController@destroy

#Blog & lara_0901專案與此專案路由比較
#admin開頭路由的URL：
#home.index:localhost:8000/admin/
#posts.index:localhost:8000/admin/posts
#posts.create:localhost:8000/admin/posts/create
#posts.store：localhost:8000/admin/posts
#posts.edit：localhost:8000/admin/posts/{post}/edit
#posts.update：localhost:8000/admin/posts/{post}
#posts.destroy：localhost:8000/admin/posts/{post}
#本專案所建立路由的URL：localhost:8000/Products
#有admin前贅的差異在於，必須先登入admin帳號，確認是管理員後才可進行後台修改

#列出7個Products路由應該有的作用
#products.index
#index方法的作用是顯示目前商品的清單，像是商品清單

#products.show
#show方法的作用是顯示指定商品，像是利用檢視商品的詳細資料

#products.create
#create方法的作用是顯示建立用於建立新商品的表單，像是新增商品的表單頁面

#products.store
#store方法的作用是將新建立的商品儲存在資料庫中，能夠將create表單所填入的商品資料儲存

#products.edit
#edit方法的作用是顯示用於編輯指定商品的表單，像是修改商品的表單

#products.update
#update方法的作用是更新資料庫中的指定商品，能夠將edit表單所填入的商品資料更新至資料庫

#products.destroy
#destroy方法的作用是從資料庫中刪除指定的商品，像是刪除不需要的商品


