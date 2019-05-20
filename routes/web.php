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

Route::get('/', function () {
    return view('welcome');
  });

  //auth
  Route::post('register', 'AuthController@handleUserRegister');
  Route::post('login', 'AuthController@handleUserLogin');

  //file
  Route::post('file-upload','ProductController@handleUploadFile');
  Route::post('files-upload','ProductController@handleUploadFiles');



  //simple user
  Route::get('user/products', 'ProductController@showUserProducts');
  Route::get('user/categories', 'ProductController@showUserCategories');
  Route::get('user/product/{id}', 'ProductController@showUserProduct');
  Route::get('user/products/{id_category}', 'ProductController@showUserProductsByCategory');
  Route::get('user/productsUser', 'ProductController@showUserProductsByUser');
  Route::post('user/review/add/{id_product}', 'ProductController@handleUserAddReview');
  Route::post('user/review/update/{id}', 'ProductController@handleUserUpdateReview');
  Route::post('user/review/delete/{id}', 'ProductController@handleUserDeleteReview');

  Route::post('user/orders/', 'ProductController@handleUserAddOrder');
  Route::post('user/order/add', 'ProductController@handleUserAddOrder');
  Route::post('user/order/update/{id}', 'ProductController@handleUserUpdateOrder');
  Route::get('user/order/delete/{id}', 'ProductController@handleUserDeleteOrder');




//admin
  Route::post('admin/product/add', 'ProductController@handleAdminAddProduct');
  Route::get('admin/products', 'ProductController@showAdminProducts');
  Route::get('admin/product/{id}', 'ProductController@showAdminProduct');
  Route::get('admin/products/{id_category}', 'ProductController@showAdminProductsByCategory');
  Route::get('admin/product/delete/{id}', 'ProductController@handleAdminDeleteProduct');
  Route::post('admin/product/update/{id}', 'ProductController@handleAdminUpdateProduct');

  Route::get('admin/users', 'ProductController@showAdminUsers');
  Route::get('admin/user/{id}', 'ProductController@showAdminUser');
  Route::post('admin/user/add', 'ProductController@handleAdminAddUser');
  Route::post('admin/user/update/{id}', 'ProductController@handleAdminUpdateUser');
  Route::get('admin/user/delete/{id}', 'ProductController@handleAdminDeleteUser');

  Route::get('admin/categories', 'ProductController@showAdminCategories');
  Route::post('admin/category/add', 'ProductController@handleAdminAddCategory');
  Route::post('admin/category/update/{id}', 'ProductController@handleAdminUpdateCategory');
  Route::get('admin/category/delete/{id}', 'ProductController@handleAdminDeleteCategory');








