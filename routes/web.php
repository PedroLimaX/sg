<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/policy', function () {
    return view('policy');
});


Auth::routes(['reset'=>false]);

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('providers', App\Http\Controllers\ProviderController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('carts', App\Http\Controllers\CartController::class);
Route::resource('orders', App\Http\Controllers\OrderController::class);
Route::resource('rols', App\Http\Controllers\RolController::class);
Route::resource('sliders', App\Http\Controllers\SliderController::class);
Route::resource('imageproducts', App\Http\Controllers\ImageProductController::class);
Route::resource('tips', App\Http\Controllers\TipController::class);



Route::get('/product/import-form',[ProductController::class,'importForm']);
Route::post('/product/import',[ProductController::class,'import'])->name('product.import');
Route::post('/product/{id}/addtocart',[ProductController::class,'addtocart'])->name('product.addtocart')->middleware('auth');


Route::get('/product/offers',[ProductController::class,'offers']);

Route::post('/order/doOrder',[OrderController::class,'doOrder'])->name('order.doOrder');

Route::get('/monthlyReport',[CartController::class, 'getOrdersReport']);

Route::get('/download-pdf',[CartController::class, 'downloadPDF'])->name('downloadPDF');

//Route::get('notify', [NotifyController::class, 'index'])->name('notify.index');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');