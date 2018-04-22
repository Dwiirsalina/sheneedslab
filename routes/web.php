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
<<<<<<< HEAD
    return view('admin.dashboard');
=======
    return view('user.signin');
>>>>>>> development
});
// Route::get('/', function () {
//     return view('user.signin');
// });
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@indexRegister');
Route::post('/register', 'AuthController@register');
Route::get('/user/cetaksurat/{id}', 'RequestsController@userCetak');
// Route::get('/user/cetaksurat/{id}', 'SuratController@cetak');

Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'AuthController@home');
	Route::get('/logout', 'AuthController@logout');
	
	Route::middleware(['user'])->group(function(){
		Route::get('/user/dashboard', 'RequestsController@userDashboard');
		Route::get('/user/dashboard/check', 'RequestsController@dashboardCheck');
		Route::post('/user/dashboard/form', 'RequestsController@createForm');
		Route::get('/user/dummy', 'RequestsController@dummyPost');
	});

	Route::middleware(['admin'])->group(function(){
        Route::get('/admin/dashboard', 'AdminController@getAdminHistory');
        Route::get('/admin/connected', 'AdminController@connected');
		Route::post('/admin/dashboard/confirm/{slug}', 'AdminController@confirm');
		Route::get('/admin/history', 'AdminController@adminHistory');
	});
});
