<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/product', 'ProductController@render');
Route::get('cari','ProductController@cari');
Route::get('/product/category/{category}', 'CategoryController@render')->name('products.category');
Route::get('/product/{id}', 'ProductDetailController@index')->name('product.detail');
Route::post('/product/order/{id}', 'CartController@order');
Route::get('view-cart', 'CartController@cart');
Route::get('check-out', 'CartController@check_out');
Route::delete('view-cart/{id}', 'CartController@delete');
Route::post('konfirmasi-check-out', 'CartController@konfirmasi');
Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@update');
Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');
Route::get('update-cart/{id}', 'CartController@updateAdd')->name('tambah');
Route::post('payment/{id}', 'PaymentController@save');
Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});