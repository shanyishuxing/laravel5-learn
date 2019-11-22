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

Route::get('index', 'IndexController@index');
Route::get('home', 'IndexController@home');
Route::get('cctv','IndexController@cctv');
Route::get('api','IndexController@api');