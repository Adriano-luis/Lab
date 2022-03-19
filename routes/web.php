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

Route::get('/login', 'LoginController@index')->name('login-get');
Route::post('/login', 'LoginController@authenticate')->name('login-post');

Route::get('/new-user', 'UserController@new')->name('new-user-get');
Route::post('/new-user', 'UserController@save')->name('new-user-post');

Route::middleware('login')->prefix('panel')->group(function(){
    
    Route::resource('/services', 'ServiceController');
    Route::resource('/blogs', 'BlogController');
    Route::get('/logout','LoginController@logout')->name('logout');
});
