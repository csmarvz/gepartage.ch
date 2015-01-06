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
		
		$ad_text="";
		
		if(Input::get('avis')!=null) {
			$ad = new Ad();
			$ad->user_id = Auth::user()->id;
			$ad->object_id = $object->id;
			$ad->save();
			$ad_text = "Ton avis de recherche a aussi été émis.";
		}
		
		return Redirect::to('')->with('success',"Le nouvel objet ". $object->name . " a bien été rajouté! ". $ad_text);
		
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
