<?php

use App\Models\Month;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function (){
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/students','AdminController@AllStudents')->name('admin.all-students');
    Route::get('/year/{id}/students/','AdminController@showYearStudents')->name('admin.show-year-students');


    Route::get('/year/{id}','AdminController@year')->name('admin.year');
    Route::get('/year/{id}/pending/{month_id}','AdminController@yearPending')->name('admin.year-pending');
    Route::get('/year/month/{id}/activate-student/{student_id}','AdminController@yearActivateStudent')->name('admin.year.month-active-student');
    Route::get('/year/month/{id}/de-activate-student/{student_id}','AdminController@yearDectivateStudent')->name('admin.year.month-de-active-student');
    Route::get('/months-students/{id}','AdminController@yearMonthsStudents')->name('admin.year-months-students');

    /**************  Start Content Video & Exam & Home Work ***********************/
            /******************** Month Config ********************/
    Route::get('/year/{id}/add-month/','AdminController@addMonth')->name('admin.year-add-month');
    Route::post('/year/store-month/','AdminController@storeMonth')->name('admin.year.store-month');
    Route::get('/year/edit-month/{id}','AdminController@editMonth')->name('admin.year-edit-month');
    Route::post('/year/update-month','AdminController@updateMonth')->name('admin.year.update-month');
    Route::get('/year/delete-month/{id}','AdminController@deleteMonth')->name('admin.year-delete-month');

    /*********************** Content ****************************/

    Route::get('/months-content/{id}','AdminController@yearMonthsContent')->name('admin.year-months-content');
    Route::get('/months-content/{id}/add','AdminController@showFormContent')->name('admin.add-new-content');
    Route::post('/months-content/add','AdminController@addContent')->name('admin.store-new-content');

                  /***********  Exam  *********/

    Route::get('/months-content-exam/{id}','AdminController@addExam')->name('admin.add-new-exam');
    Route::get('/months-content-exam/show/{id}','AdminController@showExam')->name('admin.show-exam');
    Route::get('/months-content-exam/show-students/{exam}','AdminController@showExamStudents')->name('admin.year.exam-grades');
    Route::post('/months-content-questions','AdminController@storeExam')->name('admin.store-exam');
    Route::get('/months-content-questions/{id}','AdminController@addQuestionsExam')->name('admin.add-questions');
    Route::post('/months-content-questions/store','AdminController@AddNewQuestions')->name('admin.add-new-question');
    Route::get('/months-content-questions/edit/{id}','AdminController@editQuestions')->name('admin.edit-question');
    Route::post('/months-content-questions/update','AdminController@updateQuestions')->name('admin.update-question');

            /**************** HomeWork ********/

    Route::get('/months-content-homework/{id}','AdminController@addHomework')->name('admin.add-new-homework');
    Route::get('/months-content-homework/show/{id}','AdminController@showHomework')->name('admin.show-homework');
    Route::post('/months-content-questions-homework','AdminController@storeHomework')->name('admin.store-homework');
    Route::get('/months-content-questions-homework/{id}','AdminController@addQuestionsHomework')->name('admin.add-questions-homework');
    Route::post('/months-content-questions-homework/store','AdminController@AddNewQuestionsHomework')->name('admin.add-new-question-homework');
    Route::get('/months-content-questions-homework/edit/{id}','AdminController@editQuestionsHomework')->name('admin.edit-question-homework');
    Route::post('/months-content-questions-homework/update','AdminController@updateQuestionsHomework')->name('admin.update-question-homework');

    /**************  End Content Video & Exam & Home Work ***********************/
    Route::group(['prefix'=>'videos'],function(){
        Route::get('/','AdminController@videoIndex')->name('admin.videos');
        Route::post('/add','AdminController@videoAdd')->name('admin.add-videos');
        Route::get('/show','AdminController@showIndex')->name('admin.show-video-months');

    });



    Route::get('/logout','AdminController@logout')->name('admin.logout');
});

Route::group(['middleware'=>'guest:admin'],function(){
    Route::get('login','Admin\AdminController@login')->name('admin.login');
    Route::post('login','Admin\AdminController@loginPass')->name('admin.login.pass');
});


