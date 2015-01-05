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
	Route::get('annonces', function()
	{
		return View::make('user.annonces');
	});
	Route::get('annonce', array('as' => 'annonce', 'uses' => 'AdController@create'));
	Route::get('/recherche', array('as' => 'objects.search', 'uses' => 'ObjectController@search'));
	
	Route::resource('ads','AdController');
	
	Route::get('profil', function()
	{
		return View::make('user.profil')->with('profil', true);;
	});	
	
	Route::get('profil/mes_objets', function()
	{
		return View::make('user.profil')->with('objets', true);;
	});	
	
	Route::post('update', array('as' => 'users.storeCategories', 'uses' => 'UserController@storeCategories'));
	Route::resource('user','UserController');
	
	Route::get('partage/{objectSlug}', function($objectSlug) {
		
		$object = Object::where('slug',$objectSlug)->first();
	    $users = $object->users;

	    return View::make('partage',compact('users','object'));
	});
});
