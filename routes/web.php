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
    Route::redirect('/', '/admin/home');
    Route::get('/dashboard', 'HomeController@index2')->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('profile', 'ProfileController');
});

Route::redirect('/', 'admin/dashboard');

