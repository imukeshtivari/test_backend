<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::group(['middleware' => ['jwt.auth'], 'prefix' => '/'], function () {
	Route::get('/user', function () {
	  return auth('api')->user();
	});
	Route::get('/products', 'ProductController@index');
  Route::post('/orders', 'OrderController@store');
});

Route::group(['middleware' => ['jwt.auth', 'admin'], 'prefix' => '/admin'], function () {
  Route::resource('/products', 'ProductController');
	Route::resource('/categories', 'CategoryController');
	Route::resource('/users', 'UserController');
	Route::post('/upload', 'ProductController@upload');
  Route::get('/orders', 'OrderController@index');
});

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');