<?php

use Illuminate\Support\Facades\Route;

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
    return view('product/index');
});

Auth::routes(['reset'=>false]);

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('providers', App\Http\Controllers\ProviderController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('carts', App\Http\Controllers\CartController::class);
Route::resource('orders', App\Http\Controllers\OrderController::class);
Route::resource('rols', App\Http\Controllers\RolController::class);

Route::get('/product/import-form',[ProductController::class,'importForm']);
Route::post('/product/import',[ProductController::class,'import'])->name('product.import');

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/', [ProductController::class, 'index'])->name('home');