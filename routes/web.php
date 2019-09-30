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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::resource('courses', 'CourseController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/courses/materials/{id}', 'MaterialController@show');
    Route::get('/courses/exam/{id}', 'ExamController@show');
    Route::post('/exam/result/{id}', 'ExamController@saveResult');
    Route::get('/exam/results/{id}', 'CourseController@getExamResult');
});
// dashboard
Route::group(['prefix' => 'admincp', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', 'Admincp\HomeController@index');
    Route::resource('/admins', 'Admincp\AdminController');
    Route::resource('/instructors', 'Admincp\InstructorController');
    Route::resource('/students', 'Admincp\StudentController');
    Route::resource('/courses', 'Admincp\CourseController');
    Route::resource('/levels', 'Admincp\LevelController');
    Route::resource('/materials', 'Admincp\MaterialController');
    Route::resource('/exams', 'Admincp\ExamController');
    Route::resource('/questions', 'Admincp\QuestionController');
});
