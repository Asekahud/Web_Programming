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
  
  Route::get('/', ['as' => 'home','uses' => 'UserController@index']);
  Route::get('addnew', ['as' => 'home','uses' => 'UserController@add_form']);
  Route::get ('auth', function () {  return view('authorization');});
  Route::post ('register',['as' => 'user.register','uses' => 'UserController@register']);
  Route::post ('login',['as' => 'user.login','uses' => 'UserController@login']);
  Route::get('logout', ['as' => 'logout','uses' => 'UserController@logout']);
  Route::post ('user/chatroom',['as' => 'user.open_chat','uses' => 'UserController@openChat']);
  Route::post ('user/send',['as' => 'user.send_message','uses' => 'UserController@sendMessage']);
  Route::post ('message/display',['as' => 'user.display_message','uses' => 'UserController@getLastInsertedMessage']);
  
  Route::get('products', ['as' => 'product.showall','uses' => 'ProductController@showAll']);
  Route::get('myproducts', ['as' => 'product.showall','uses' => 'ProductController@getMyProducts']);
  Route::get ('product/update/{id}',['as' => 'product.updateForm','uses' => 'ProductController@updateForm']);
  Route::get ('product/delete/{id}',['as' => 'product.delete','uses' => 'ProductController@delete']);
  Route::get ('product/details/{id}/',['as' => 'product.details','uses' => 'ProductController@showDetails']);
  Route::post ('product/create',['as' => 'product.create','uses' => 'ProductController@addToCatalogue']);
  Route::post ('product/update',['as' => 'product.update','uses' => 'ProductController@update']);
  Route::get ('product/search',['as' => 'product.search','uses' => 'ProductController@search']);
  Route::get('images/{filename}', ['as' => 'product.image','uses' => 'ProductController@getImage' ]);
  Route::get('search/autocomplete', 'ProductController@autocomplete' ); 
    
  Route::get('events', ['as' => 'event.showall','uses' => 'EventController@showAll']);
  Route::get('myevents', ['as' => 'event.showall','uses' => 'EventController@getMyEvents']);
  Route::get ('event/update/{id}',['as' => 'event.updateForm','uses' => 'EventController@updateForm']);
  Route::get ('event/delete/{id}',['as' => 'event.delete','uses' => 'EventController@delete']);
  Route::get ('event/details/{id}',['as' => 'event.details','uses' => 'EventController@showDetails']);
  Route::post ('event/create',['as' => 'event.create','uses' => 'EventController@addToCatalogue']);
  Route::post ('event/update',['as' => 'event.update','uses' => 'EventController@update']);
  Route::post ('event/book',['as' => 'event.book','uses' => 'EventController@book']);
  Route::get ('event/guestlist/{id}',['as' => 'event.guest_list','uses' => 'EventController@guestList']);
  
   
  
});

