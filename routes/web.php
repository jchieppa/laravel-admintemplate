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

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//    Route::redirect('/home', 'dashboard');
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('parents', 'ParentsController')->except('show');
    Route::resource('teachers', 'TeachersController')->except('show');
    Route::resource('profile', 'ProfileController')->only(['edit', 'update']);

    /*
     * Sms Routes
     */

    Route::resource('sms', 'SmsController');
    Route::get('/sms/multi/create', 'SmsController@multicreate')->name('sms.multi.create');
    Route::get('/sms/teacher/create', 'SmsController@teachercreate')->name('sms.teacher.create');

    /*
     * Ajax Routes
     */

    Route::post('ajax', 'AjaxController@parentsByTeacher')->name('parents.by.teachers.post');
});

Route::redirect('/', 'admin/dashboard');
