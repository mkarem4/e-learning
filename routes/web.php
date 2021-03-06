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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::resource('/courses', 'CourseController');


// dashboard
Route::group(['prefix' => 'admincp'], function () {
    Route::get('/dashboard', 'Admincp\HomeController@index');
    Route::resource('/admins', 'Admincp\AdminController');
});
