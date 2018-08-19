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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'auth'], function(){
	Route::get('', 'DashboardController@index')->name('admin');

	/* Route quản lý danh mục*/
	include 'admin/category.php';

	/* Route quản lý sản phẩm*/
	include 'admin/product.php';

	/* Route quản lý tài khoản*/
	include 'admin/user.php';
});

Route::get('/', 'Admin\HomeController@index')->name('home');

Route::get('/login', 'Admin\DashboardController@login')->name('login');
Route::post('/login', 'Admin\DashboardController@post_login')->name('login');

Route::get('/logout', 'Admin\DashboardController@logout')->name('logout');

// Route::get('/', function () {
//     return view('welcome');
// });
