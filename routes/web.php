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

Route::get('/', 'HomeController@index');

Route::get('/signin', 'SignController@signIn');
Route::post('/in', 'SignController@in');
Route::get('/signup', 'SignController@signUp');
Route::post('/up', 'SignController@up');
Route::get('/signout', 'SignController@signOut');