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

use App\Course;
use App\Lectures;
use App\Group;
use \App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/groups', 'GroupController')->only('index');
Route::resource('/lectures', 'LecturesController')->only('show');
Route::resource('/messages', 'MessageController')->only('index');



Route::Group(['middleware'=>['auth', 'admin']], function(){

#Course :

    Route::resource('/course', 'CourseController');
    Route::get('/courseDelete/{id}', 'CourseController@deleteCourse')->name('courseDelete');

#Groups:

    Route::resource('/groups', 'GroupController')->middleware('admin')->except('index');
    Route::get('/groupDelete/{id}', 'GroupController@deleteGroup')->name('groupDelete');

#Lectures :
    Route::resource('/lectures', 'LecturesController')->middleware('admin')->except('show');
    Route::get('/lectureDelete{id}', 'LecturesController@deletelecture')->Name('lectureDelete');
    Route::get('/showLectures/{id}','LecturesController@getLectures')->Name('showLectures');



 //   Route::resource('/users', 'UsersController');

    Route::get('/userDelete/{id}','UsersController@deleteUser')->name('userDelete');
    Route::resource('/files', 'FileController');
    Route::get('/deleteFile/{id}', 'FileController@deleteFile')->name('deleteFile');
    Route::get('hidefile/{id}', 'FileController@hideFile')->Name('hideFile');
    Route::get('showFile/{id}', 'FileController@showFile')->Name('showFile');



    #messages
    Route::resource('/messages', 'MessageController')->middleware('admin')->except('index');
    Route::get('/sendMessages/{id}', 'MessageController@sendMessage')->Name('sendMessages');

});
    #Users:
    Route::resource('/users', 'UsersController')->middleware('auth');








