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
  Route::get ('signup', function () {  return view('register');});
  Route::get ('signin', function () {  return view('login');});


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
  Route::get('/', ['as' => 'start','uses' => 'UserController@index']); 
  Route::post ('register',['as' => 'user.register','uses' => 'UserController@register']);
  Route::post ('login',['as' => 'user.login','uses' => 'UserController@login']);    
});

