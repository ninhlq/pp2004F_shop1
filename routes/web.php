<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontpageController@home');

Route::get('brand/{id}', 'FrontpageController@brand');

Route::get('product/{product}', 'FrontpageController@productDetails')->name('product.details');

Route::get('product/{product}/ajax', 'FrontpageController@ajaxProduct');

Route::get('cart/ajax', 'FrontpageController@ajaxCart');

Route::get('cart/{product}/ajaxAdd/{quantity?}', 'FrontpageController@ajaxAddCart');

Route::get('cart/{product}/ajaxRemove', 'FrontpageController@ajaxRemoveCart');

Route::get('cart/ajaxEmpty', 'FrontpageController@ajaxEmptyCart');

Route::post('order/store', 'OrderController@store')->name('order.store');

Route::get('about', 'FrontpageController@about');

Route::get('contact', 'FrontpageController@contact');

Route::get('checkout', 'FrontpageController@checkout');

Route::get('cart', 'FrontpageController@cart');

Route::get('login', 'FrontpageController@login');

Route::get('register', 'FrontpageController@register');

Route::get('search/submit', 'FrontpageController@searchSubmit')->name('search.submit');

Route::get('search', 'FrontpageController@search');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Route Group
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->as('admin.')->middleware('auth.admin')->group(function(){
    Route::fallback('AdminController@page404');

    Route::get('login', 'AdminController@login');

    Route::post('login', 'Auth\LoginController@login')->name('login');

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'AdminController@dashboard');

    Route::resource('product', 'ProductController');

    Route::resource('order', 'OrderController')->except(['create', 'store', 'destroy']);

    Route::resource('bill', 'BillController')->only(['index', 'show']);

    Route::resource('brand', 'BrandController')->except(['create', 'edit']);

    Route::get('media', 'AdminController@media');

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
