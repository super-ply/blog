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

Route::get('admin/login','Admin\LoginController@login');
Route::get('admin/index','Admin\LoginController@index');
Route::any('admin/dologin','Admin\LoginController@dologin');
Route::any('admin/create','Admin\CaptchaController@create');
Route::get('admin/jiami','Admin\LoginController@jiami');