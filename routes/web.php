<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    // dd ($cats);
    return view('hello');
})->name('home.index');


Route::get('/demo', function () {
    $title = "Hello Page";
    $name = '';
    $email = '';
    $age = '';
    return view('demo', compact('title','name'));
})->name('home.about');;


Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/edit/{cat}', [CategoryController::class, 'edit'])->name('category.edit');

Route::put('category/update/{cat}', [CategoryController::class, 'update'])->name('category.update');

Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::delete('category/delete/{cat}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('product/upload', [ProductController::class,'form_upload'])->name('product.upload');

Route::get('product', [ProductController::class,'index'])->name('product.index');
Route::post('product/upload', [ProductController::class,'upload'])->name('product.upload');
