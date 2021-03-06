<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {  return view('welcome');});
//Route::get ('/',['as' => 'welcome','uses' => 'UserController@index']);
Route::get ('unpublished',['as' => 'posts.unpublished','uses' => 'PostController@unpublished']);
Route::get ('published',['as' => 'posts.published','uses' => 'PostController@published']);
Route::get ('myposts',['as' => 'posts.myposts','uses' => 'PostController@showAll']);

Route::get ('post/create',['middleware'=> 'auth','as' => 'post.create','uses' => 'PostController@create']);
Route::post('post',['as' => 'post.store','uses' => 'PostController@store']);
//Route::get ('post/{post}',['as' => 'post.show','uses' => 'PostController@show']);
Route::get ('post/edit/{id}',['as' => 'post.edit','uses' => 'PostController@edit']);
Route::get ('post/delete/{id}',['as' => 'post.delete','uses' => 'PostController@delete']);
Route::post ('post/update',['as' => 'post.update','uses' => 'PostController@update']);

Route::get ('post/search',['as' => 'post.searchform','uses' => 'PostController@searchForm']);
Route::get('post/search/results',['as' => 'post.search','uses' => 'PostController@search']);

//$router->resource('post', 'PostController');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
