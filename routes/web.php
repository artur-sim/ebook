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


Route::prefix('students')->group(function () {
    Route::get('', 'StudentController@index')->name('students.index');
    Route::get('create', 'StudentController@create')->name('students.create');
    Route::get('edit/{student}', 'StudentController@edit')->name('students.edit');
    Route::get('show/{student}', 'StudentController@show')->name('students.show');
    Route::post('store', 'StudentController@store')->name('students.store');
    Route::post('update/{student}', 'StudentController@update')->name('students.update');
    Route::post('delete/{student}', 'StudentController@destroy')->name('students.destroy');
});

Route::prefix('lectures')->group(function () {
    Route::get('', 'LectureController@index')->name('lectures.index');
    Route::get('create', 'LectureController@create')->name('lectures.create');
    Route::get('edit/{lecture}', 'LectureController@edit')->name('lectures.edit');
    Route::post('store', 'LectureController@store')->name('lectures.store');
    Route::post('update/{lecture}', 'LectureController@update')->name('lectures.update');
    Route::post('delete/{lecture}', 'LectureController@destroy')->name('lectures.destroy');
});

Route::prefix('grades')->group(function () {
    Route::get('', 'GradeController@index')->name('grades.index');
    Route::get('create', 'GradeController@create')->name('grades.create');
    Route::get('edit/{grade}', 'GradeController@edit')->name('grades.edit');
    Route::post('store', 'GradeController@store')->name('grades.store');
    Route::post('update/{grade}', 'GradeController@update')->name('grades.update');
    Route::post('delete/{grade}', 'GradeController@destroy')->name('grades.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');