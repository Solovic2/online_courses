<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::get('subject/{id}','HomeController@show')->name('show.subject.months');
    Route::group(['middleware'=>'pay'],function(){
        Route::get('subject/month/{month_id}','HomeController@monthShow')->name('show.months');
    });
});
Route::get('/home', 'HomeController@index')->name('home');
