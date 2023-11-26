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
    Route::resource('CartItems',CartItemController::class);
    Route::resource('Orders',OrderController::class);
});

require __DIR__.'/auth.php';

//Route::resource('Products',ProductController::class)->only([
//    'index','show','store','update','destroy'
//]);

Route::get('Products',[ProductController::class,'index'])->name("products.index");
Route::get('Products/{Product}',[ProductController::class,'show'])->name("products.show");
Route::get('Products/create',[ProductController::class,'create'])->name("products.create");
Route::post('Products',[ProductController::class,'store'])->name("products.store");
Route::get('Products/{Product}/edit',[ProductController::class,'edit'])->name("products.edit");
Route::patch('Products/{Product}',[ProductController::class,'update'])->name("products.update");
Route::delete('Products/{Product}',[ProductController::class,'destroy'])->name("products.destroy");

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
#index方法的作用是顯示目前資源的清單，像是產品、公告清單

#products.show
#show方法的作用是顯示指定資源的清單，像是利用搜尋功能來找符合的資料

#products.create
#create方法的作用是顯示建立用於建立新資源的表單，像是新增產品、新增公告的表單頁面

#products.store
#store方法的作用是將新建立的資源儲存在資料庫中，能夠將create表單所填入的資料儲存

#products.edit
#edit方法的作用是顯示用於編輯指定資源的表單，像是修改產品、公告內容的表單

#products.update
#update方法的作用是更新資料庫中的指定資源，能夠將edit表單所填入的資料更新至資料庫

#products.destroy
#destroy方法的作用是從資料庫中刪除指定的資源，像是刪除不需要的產品、公告


