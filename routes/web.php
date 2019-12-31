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

//Route::get('/admin/login', 'Admin\LoginController@login'); namespace('Admin')->

//后台路由
Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::match(['get', 'post'], 'login', 'LoginController@login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
