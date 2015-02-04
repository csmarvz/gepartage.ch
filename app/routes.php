<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});



Route::get('reset_pw', function()
{
	foreach(User::all() as $user){
		$user->password = Hash::make('levram');
		$user->save();
	}
	return "all password reset";
});

Route::get('connexion', function(){
	return View::make('login');
});


Route::post('connexion', array('as' => 'login', 'uses' => 'AuthController@postLogin'));


Route::get('deconnexion', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

Route::get('inscription', function()
{
	return View::make('inscription');
});

Route::resource('users','UserController');

Route::group(array('before' => 'auth'), function()
{
	

	Route::group(array('before' => 'admin'), function()
	{
		Route::get('admin', function()
		{
			
			
			return View::make('admin');
		});
		
		Route::post('masquerade', array('as' => 'masquerade', 'uses' => 'AuthController@masquerade'));
		Route::get('masquerade',function(){
			return View::make('masquerade');
		});
		
		
	});
	
	Route::get('annonce', array('as' => 'annonce', 'uses' => 'AdController@create'));
	Route::get('recherche', array('as' => 'objects.search', 'uses' => 'ObjectController@search'));
	
	Route::resource('ads','AdController');
	Route::resource('objects','ObjectController');
	
	
	Route::get('ajout', array('as' => 'objects.create', 'uses' => 'ObjectController@create'));
	
	Route::get('message/{objectId}/{userId}', function($objectId,$userId){
		$object = Object::find($objectId);
		$user = User::find($userId);
		return View::make('message.create')->with('object', $object)->with('user',$user);
	});
	
	Route::get('profil', function()
	{
		return View::make('user.profil')->with('profil', true);;
	});	
	
	Route::get('profil/mes_objets', function()
	{
		return View::make('user.profil')->with('objets', true);;
	});	
	
	Route::get('profil/mes_avis', function()
	{
		return View::make('user.profil')->with('avis', true);;
	});	
	
	Route::get('messages', function()
	{
		return Redirect::to('messages/reception');
	});
	
	Route::get('messages/reception', function()
	{
		return View::make('user.messages')->with('inbox', true);;
	});
	
	Route::get('messages/envoi', function()
	{
		return View::make('user.messages')->with('outbox', true);;
	});
	
	Route::get('messages/nouveau', function()
	{
		return View::make('user.messages')->with('new', true);;
	});
	
	Route::post('messages', array('as' => 'messages.store', 'uses' => 'MessageController@store'));
	
	Route::post('update', array('as' => 'users.storeCategories', 'uses' => 'UserController@storeCategories'));
	Route::resource('user','UserController');
	
	// Route::get('messages/{userId}', array('uses' => 'MessageController@showByUser'));
	
	//Route::resource('messages','MessageController');
	
	
	Route::get('partage/{objectSlug}', function($objectSlug) {
		
		$object = Object::where('slug',$objectSlug)->first();
	    $users = $object->users;

	    return View::make('partage',compact('users','object'));
	});
});
