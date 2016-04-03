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
  
  Route::get('products', ['as' => 'product.showall','uses' => 'ProductController@showAll']);
  Route::get ('product/details/{id}',['as' => 'product.details','uses' => 'ProductController@showDetails']); 
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
  Route::post ('product/create',['as' => 'product.create','uses' => 'ProductController@addToCatalogue']);
  Route::get('/', ['as' => 'home','uses' => 'UserController@index']);
  Route::get('addnew', ['as' => 'home','uses' => 'UserController@add_form']);
  Route::get ('auth', function () {  return view('authorization');});  
  Route::post ('register',['as' => 'user.register','uses' => 'UserController@register']);
  Route::post ('login',['as' => 'user.login','uses' => 'UserController@login']);    
});

