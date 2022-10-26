<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');


Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::post('/login', [HomeController::class, 'check_login']);

Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::post('/register', [HomeController::class, 'check_register']);

Route::get('/danh-muc/{category}-{slug}', [HomeController::class, 'category'])->name('home.category');
Route::get('//{product}-{slug}', [HomeController::class, 'productDetail'])->name('home.productDetail');

Route::group(['prefix' => 'cart'], function() {
    Route::get('view',[CartController::class,'view'])->name('cart.view');
    Route::get('add/{product}',[CartController::class,'add'])->name('cart.add');

    Route::get('remove/{id}',[CartController::class,'remove'])->name('cart.remove');
    Route::get('update/{id}',[CartController::class,'update'])->name('cart.update');
    Route::get('clear',[CartController::class,'clear'])->name('cart.clear');
});

Route::group(['prefix' => 'order', 'middleware' => 'cus'], function() {
    Route::get('checkout',[HomeController::class,'checkout'])->name('order.checkout');
    Route::post('checkout',[HomeController::class,'post_checkout']);
    Route::get('order-history',[HomeController::class,'order_history'])->name('order.order_history');
});


// Admin router
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('', [AdminController::class, 'index'])->name('admin.index');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'blog' => BlogController::class,
        'user' => UserController::class,
    ]);

    Route::group(['prefix' => 'product'], function() {
        Route::get('trashed',[ProductController::class,'trashed'])->name('product.trashed');
        Route::get('restore/{id}',[ProductController::class,'restore'])->name('product.restore');
    });
   
});

