<?php

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
//frontand............................................
Route::get('/','HomeController@index');

//show produt by  categoey or manufacture...........................................
Route::get('/product-by-category/{category_id}','HomeController@show_product_by_category');
Route::get('/product-by-manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view-product/{product_id}','HomeController@view_product');


//Cart---root--------------------------------
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-product-rowid/{rowid}','CartController@delete_product_rowid');
Route::get('/up-quantity/{id}/{qty}','CartController@up_quantity');
Route::get('/down-quantity/{id}/{qty}','CartController@down_quantity');


//checkout---root--------------------------------
Route::get('/login-check','CheckoutController@login_check');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/save-shipping-detail','CheckoutController@save_shipping_detail');

Route::get('/checkout','CheckoutController@checkout');
//customer login logout-----------------------------------
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');


//payment --rout-----------------------------------
Route::get('/payment','PaymentController@payment');
Route::get('/page-note-fond','CheckoutController@page_note_fond');
Route::get('/contact','CheckoutController@contact');
Route::get('/methode/{methode}','PaymentController@methode');
//manage order --rout-----------------------------------
Route::get('/manage-orders','PaymentController@manage_orders');
Route::get('/unactive-order/{order_id}','PaymentController@unactive_order');
Route::get('/active-order/{order_id}','PaymentController@active_order');
Route::get('/view-order/{order_id}','PaymentController@view_order');
Route::get('/delete-order/{order_id}','PaymentController@delete_order');




//backand..............................................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category---root--------------------------------
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/unactive-category/{category_id}','CategoryController@unactive_category');
Route::get('/active-category/{category_id}','CategoryController@active_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::put('/update-category','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');

//Brands---root--------------------------------
Route::get('/add-manufacture','ManufactureController@index');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/unactive-manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::put('/update-manufacture','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
//product---root--------------------------------
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::put('/update-product','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

//slider---root--------------------------------
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');

