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

Route::get('/', 'PostsController@login')->name('login');
Route::get('/admin','PostsController@admin')->name('admin');  

Route::get('/home1', 'PostsController@home')->name('home');

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

Route::get('/project', 'PostsController@project')->name('index.project');

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
Route::get('deleteList/{id}/{name}','PostsController@deleteList')->name('index.deleteList');
Route::get('/cardname','PostsController@cardname')->name('index.cardname');
Route::post('/addProject','PostsController@addProject')->name('index.addProject');
Route::get('/myProjects','PostsController@myProjects')->name('index.myProjects');
Route::post('/addaccess','PostsController@addaccess')->name('index.addaccess');
Route::post('/deleteaccess/{projectName}/{userName}/{access_id}','PostsController@deleteaccess')->name('index.deleteaccess');
Route::post('pusher/auth', 'PostsController@authorizeUser');