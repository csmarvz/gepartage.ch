<?php

class UserController extends BaseController {

	public function index()
	{
	}
	
	public function store()
	{
		$data = Input::all();
		$data['password'] = Hash::make($data['password']);
		User::create($data);
		
		return View::make('home');
	}
	
	public function storeCategories(){
		$data = Input::get('categories');
		if($data){
			Auth::user()->categories()->sync($data);
		}else {
			Auth::user()->categories()->sync([]);
		}
	
		return Redirect::to('profil');
	}
	
	public function show()
	{
	}
	public function edit()
	{
	}
	public function create()
	{
	}
	public function update($id)
	{
		
		$data = Input::all();
		
		if($data['password']!=""){
			$data['password'] = Hash::make($data['password']);
		}else{
			unset($data['password']);
		}
		
		
		if(isset($data['categories_array'])){
			Auth::user()->categories()->sync($data['categories_array']);
			unset($data['categories_array']);
		}else {
			Auth::user()->categories()->sync([]);
		}
		
		
		Auth::user()->update($data);
		
		return Redirect::to('profil');
	}
	public function destroy()
	{
	}
	public function login()
	{
	}

}
