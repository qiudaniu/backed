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
    Route::group(['middleware'=>'auth.admin'], function (){
        Route::get('/', 'IndexController@index')->name('admin');
        Route::resources([
            'nation' => 'NationController',
            'line' => 'LineController',
            'weight' => 'WeightController',
            'price' => 'PriceController',
        ]);
    });

    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');
});

Auth::routes();

Route::get('/freight', 'FreightController@index');
