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
		
		
		
		if(isset($data['password']) && $data['password']!=""){
			$data['password'] = Hash::make($data['password']);
		}else{
			unset($data['password']);
		}
		
		$object_update = false;
		if($data['objects_update']) {
			$object_update = true;
			if(isset($data['objects_array'])){
				Auth::user()->objects()->sync($data['objects_array']);
				unset($data['objects_array']);
			}else {
				Auth::user()->objects()->sync([]);
			}
		}
		
		unset($data['objects_update']);
		
		Auth::user()->update($data);
		if($object_update) {
			return Redirect::to('profil/mes_objets');
		}
		return Redirect::to('profil');
	}
	public function destroy()
	{
	}
	public function login()
	{
	}

}
