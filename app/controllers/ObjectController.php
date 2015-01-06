<?php

class ObjectController extends BaseController {

	public function index()
	{
	}
	
	public function store()
	{
		$object = new Object();
		$object->name = Input::get('name');
		$object->slug = Str::slug($object->name);
		$object->save();
		
		return Redirect::to('');
		
	}
	
	public function show($id)
	{
		$ad = Ad::find($id);
		return View::make('ad.show',compact('ad'));
	}
	public function edit()
	{
	}
	public function create()
	{
		Return View::make('object.create');
	}
	public function update($id)
	{
	}
	public function destroy()
	{
	}
	
	public function search()
	{
		$search = Str::slug(Input::get('q'));
		$objects = Object::where('slug','like','%' . $search.'%')->get();
		
		return View::make('search',compact('objects','search'));
	}

}
