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
    return view('user.signin');
});

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@indexRegister');
Route::post('/register', 'AuthController@register');

Route::get('/home', 'AuthController@home');

Route::get('/user/dashboard', 'RequestsController@userDashboard');
Route::post('/user/dashboard/form', 'RequestsController@createForm');
Route::get('/user/dummy', 'RequestsController@dummyPost');

Route::get('/admin/dashboard', 'AuthController@home');