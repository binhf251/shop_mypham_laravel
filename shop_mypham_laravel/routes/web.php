<?php

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
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');
Route::post('/search', 'App\Http\Controllers\HomeController@search');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

// Product Category
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{cate_pro_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{cate_pro_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{cate_pro_id}', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{cate_pro_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{cate_pro_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');

// Brand Category
Route::get('/add-brand-product', 'App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_pro_id}', 'App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_pro_id}', 'App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_pro_id}', 'App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_pro_id}', 'App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_pro_id}', 'App\Http\Controllers\BrandProduct@update_brand_product');

// Category
Route::get('/add-product', 'App\Http\Controllers\Product@add_product');
Route::get('/edit-product/{pro_id}', 'App\Http\Controllers\Product@edit_product');
Route::get('/delete-product/{pro_id}', 'App\Http\Controllers\Product@delete_product');
Route::get('/all-product', 'App\Http\Controllers\Product@all_product');

Route::get('/unactive-product/{pro_id}', 'App\Http\Controllers\Product@unactive_product');
Route::get('/active-product/{pro_id}', 'App\Http\Controllers\Product@active_product');

Route::post('/save-product', 'App\Http\Controllers\Product@save_product');
Route::post('/update-product/{pro_id}', 'App\Http\Controllers\Product@update_product');

// Product Page
Route::get('/category-product/{cate_id}', 'App\Http\Controllers\CategoryProduct@show_category');
Route::get('/brand-product/{brand_id}', 'App\Http\Controllers\BrandProduct@show_brand');
Route::get('/product/{product_id}', 'App\Http\Controllers\Product@product_detail');

// Cart
Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
Route::post('/add-cart-ajax', 'App\Http\Controllers\CartController@add_cart_ajax');
Route::post('/update-cart-quantity', 'App\Http\Controllers\CartController@update_cart_quantity');
Route::get('/delete-cart/{row_id}', 'App\Http\Controllers\CartController@delete_cart');
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/clear-cart', 'App\Http\Controllers\CartController@clear_cart');

// Check out
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');
Route::post('/order', 'App\Http\Controllers\CheckoutController@order');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');

