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

/*
09の課題３
Route::get('XXX', 'AaaController@bbb');
*/



Route::group(['prefix' => 'admin'],function(){
    Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
