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



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/dashboard', 'Admin\AdminController@index');
    Route::resource('/category', 'Admin\CategoryController');

    // Route::resource('/users', 'UserController');
    Route::resource('/applications', 'Admin\ApplicationController');

    Route::resource('/vendors', 'Admin\UserController');
    Route::get('/users', 'Admin\UserController@get_users');
    Route::resource('/cms', 'Admin\CmsController');
    // Route::get('/orderlist', 'Admin\CustomOrderController@index');
    // Route::post('/orderartistupdate', 'Admin\CustomOrderController@orderAdminUpdate')->name('order.admin.update');

	Route::resource('/blog', 'Admin\BlogController');
	// Route::resource('/event', 'Admin\EventController');
	Route::resource('/team', 'Admin\TeamController');
	Route::resource('/portfolio', 'Admin\PortfolioController');
	// Route::resource('/occasion', 'Admin\OccasionController');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


});