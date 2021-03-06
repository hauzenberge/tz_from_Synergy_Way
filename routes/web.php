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


Route::group(['middleware' => 'auth'], function () {
     Route::get('/home', 'HomeController@index')->name('home');
     Route::prefix('/user')->group(function () {

        Route::get('/profile/{id}', 'UserController@profile');
        Route::any('/update/{id}', 'UserController@update');

        Route::any('/add', 'UserController@add');
        Route::any('/store', 'UserController@store');
     });
});