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

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login-post');

Route::get('/new-user', 'UserController@new')->name('new-user');
Route::post('/new-user', 'UserController@save')->name('new-user-post');

Route::middleware('login')->prefix('pannel')->group(function(){
    Route::get('/', function(){return view('pannel.index');})->name('pannel');
    Route::get('/profile', 'UserController@edit')->name('user.edit');
    Route::post('/profile', 'UserController@update')->name('user.update');
    
    Route::resource('/services', 'ServiceController');
    Route::resource('/blogs', 'BlogController');
    Route::post('/logout','LoginController@logout')->name('logout');
});
