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
  Route::get ('auth', function () {  return view('authorization');});
  Route::post ('register',['as' => 'user.register','uses' => 'UserController@register']);
  Route::post ('login',['as' => 'user.login','uses' => 'UserController@login']);
  Route::get('logout', ['as' => 'logout','uses' => 'UserController@logout','middleware'=>'auth']);
  Route::get('mychats', ['as' => 'chats','uses' => 'UserController@getUserChats','middleware'=>'auth']);
  Route::post ('user/chatroom',['as' => 'user.open_chat','uses' => 'UserController@openChat']);
  Route::post ('user/send',['as' => 'user.send_message','uses' => 'UserController@sendMessage']);
  Route::post ('/message/display',['as' => 'user.display_message','uses' => 'UserController@getUnreadMessages']);
  
  Route::get('products', ['as' => 'product.showall','uses' => 'ProductController@showAll']);
  Route::get('myproducts', ['as' => 'product.showall','uses' => 'ProductController@getMyProducts','middleware'=>'auth']);
  Route::get ('product/update/{id}',['as' => 'product.updateForm','uses' => 'ProductController@updateForm','middleware'=>'auth']);
  Route::get ('product/delete/{id}',['as' => 'product.delete','uses' => 'ProductController@delete','middleware'=>'auth']);
  Route::get ('product/details/{id}/',['as' => 'product.details','uses' => 'ProductController@showDetails']);
  Route::get('product/createForm', ['as' => 'product.create_form','uses' => 'ProductController@createForm','middleware'=>'auth']);
  Route::post ('product/create',['as' => 'product.create','uses' => 'ProductController@addToCatalogue','middleware'=>'auth']);
  Route::post ('product/update',['as' => 'product.update','uses' => 'ProductController@update','middleware'=>'auth']);
  Route::get ('product/search',['as' => 'product.search','uses' => 'ProductController@search']);
  Route::get('images/{filename}', ['as' => 'product.image','uses' => 'ProductController@getImage','middleware'=>'auth' ]);
  Route::get('search/autocomplete', 'ProductController@autocomplete' ); 
    
  Route::get('events', ['as' => 'event.showall','uses' => 'EventController@showAll']);
  Route::get('myevents', ['as' => 'event.showall','uses' => 'EventController@getMyEvents','middleware'=>'auth']);
  Route::get ('event/update/{id}',['as' => 'event.updateForm','uses' => 'EventController@updateForm','middleware'=>'auth']);
  Route::get ('event/delete/{id}',['as' => 'event.delete','uses' => 'EventController@delete','middleware'=>'auth']);
  Route::get ('event/details/{id}',['as' => 'event.details','uses' => 'EventController@showDetails']);
  Route::get('event/createForm', ['as' => 'event.create_form','uses' => 'EventController@createForm','middleware'=>'auth']);
  Route::post ('event/create',['as' => 'event.create','uses' => 'EventController@addToCatalogue','middleware'=>'auth']);
  Route::post ('event/update',['as' => 'event.update','uses' => 'EventController@update']);
  Route::post ('event/book',['as' => 'event.book','uses' => 'EventController@book','middleware'=>'auth']);
  Route::get('event/images/{filename}', ['as' => 'event.image','uses' => 'EventController@getImage','middleware'=>'auth' ]);
  Route::get ('event/guestlist/{id}',['as' => 'event.guest_list','uses' => 'EventController@guestList','middleware'=>'auth']);
  
});

