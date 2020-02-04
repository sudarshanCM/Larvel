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

Route::get('/', 'PostsController@home')->name('home');
  



Route::get('/users/{id}',function($id){
return 'This is user'.$id;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/listname','PostsController@retrieve')->name('index.listname');
Route::post('/addname','PostsController@add')->name('index.add');
Route::post('/addcard/{_id}','PostsController@addcard')->name('index.addcard');