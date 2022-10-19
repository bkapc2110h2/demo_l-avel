<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
Route::get('//{product}-{slug}', [HomeController::class, 'productDetail'])->name('home.productDetail');

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
