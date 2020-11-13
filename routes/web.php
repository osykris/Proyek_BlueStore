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

// for customer
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
Route::get('payment/{id}', 'PaymentController@index');
Route::post('payment/{id}', 'PaymentController@save');
Route::get('seePayment/{id}','PaymentController@seePayment');
Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});


// for admin
Route::get('admin', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('loginAdmin');
Route::post('admin/logout', 'Auth\AdminAuthController@postLogout')->name('logoutAdmin');
Route::group(['middleware'=>'auth:admin'], function() {
    Route::get('/ajax/categories/search', 'Admin\CategoryController@ajaxSearch');
        Route::get('/dashboard','Admin\HomeController@index')->name('home');
        Route::get('/cetak','Admin\DashboardController@cetak')->name('cetak');
        Route::get('products', 'Admin\ProductController@index')->name('product');
        Route::get('products/addProduct', 'Admin\ProductController@indexAdd');
        Route::post('products/saveProduct', 'Admin\ProductController@addProduct');
        Route::get('products/edit/{id}', 'Admin\ProductController@indexEdit');
        Route::post('products/edit/{id}', 'Admin\ProductController@save');
        Route::delete('products/{id}', 'Admin\ProductController@delete');
        Route::get('purchase', 'Admin\PurchaseController@index')->name('purchase');
        Route::get('purchase/seePayment/{id}','Admin\PurchaseController@seePayment');
        Route::post('purchase/seePayment/{id}','Admin\PurchaseController@save');
        Route::get('purchase/detail/{id}', 'Admin\PurchaseController@detail');
        Route::get('customers', 'Admin\CustomerController@index')->name('customers');
        Route::delete('customers/{id}', 'Admin\CustomerController@delete');
        Route::get('categories', 'Admin\CategoryController@index')->name('categories');
        Route::get('categories/addCategory', 'Admin\CategoryController@indexAdd');
        Route::post('categories/saveCategory', 'Admin\CategoryController@addCategory');
        Route::get('categories/edit/{id}', 'Admin\CategoryController@indexEdit');
        Route::post('categories/edit/{id}', 'Admin\CategoryController@save');
        Route::delete('categories/{id}', 'Admin\CategoryController@delete');
});

