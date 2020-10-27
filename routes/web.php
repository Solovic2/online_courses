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
    Route::group(['middleware'=>'pay','prefix'=>'subject/month/{month_id}'],function(){

        Route::get('/','HomeController@monthShow')->name('show.months');
        /** Exam  */
        Route::get('exam/{exam_id}','HomeController@examShow')->name('show.exam')->middleware('signed');
        Route::post('correct-exam','HomeController@correctExam')->name('correct');
        Route::get('end-time','HomeController@endTime')->name('end.time');
                /* Middleware */
        Route::get('exam-answer-correct/{exam_id}','HomeController@studentAnswerExam')->name('show.exam.correct.answer')->middleware('exam');

        /** Homework */
        Route::get('homework/{homework_id}','HomeController@showHomework')->name('show.homework');
        Route::post('homework/correct-homework','HomeController@correctHomework')->name('correct-homework');
                         ### Middleware ###
        Route::get('homework-answer-correct/{homework_id}','HomeController@studentAnswerhomework')->name('show.homework.correct.answer')->middleware('homework');

    });
});
Route::get('/home', 'HomeController@index')->name('home');
