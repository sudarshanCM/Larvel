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
Route::get('/admin','PostsController@admin')->name('admin');  



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
Route::get('/update/{to}/{from}/{target}','PostsController@update')->name('index.update');
Route::post('/image/{_id}','PostsController@image')->name('index.addimage');
Route::post('/description/{_id}','PostsController@description')->name('index.adddescription');
Route::post('/comment/{_id}','PostsController@comment')->name('index.addcomment');
// Route::get('/getdesc/{_id}','PostsController@getdesc')->name('index.getdesc');
Route::put('desc/{id}','PostsController@desc')->name('index.desc');
Route::put('moveCard/','PostsController@move')->name('index.move');
Route::get('deleteCard/{id}','PostsController@deleteCard')->name('index.deleteCard');