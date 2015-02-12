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
		
		return Redirect::to('')->with('success',$object->name . " a bien été rajouté à la base ! ". $ad_text);
		
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
		if($objects->count()==1 && $objects->first()->slug == $search){
			$object = $objects->first();
			return Redirect::to("partage/$object->slug");
		}
		
		return View::make('search',compact('objects','search'));
	}
	
	public static function allFourColumns()
	{
		$count = Object::where('is_custom','=',0)->count();
		$rowSize = round($count/4);
		$col1 = Object::where('is_custom','=',0)->orderBy('name','asc')->take($rowSize)->get();
	
		$col2 = Object::where('is_custom','=',0)->orderBy('name','asc')->take($rowSize)->skip($rowSize)->get();
		$col3 = Object::where('is_custom','=',0)->orderBy('name','asc')->take($rowSize)->skip($rowSize*2)->get();
		$col4 = Object::where('is_custom','=',0)->orderBy('name','asc')->take($rowSize)->skip($rowSize*3)->get();
		
		$result = "<div class='col-md-3'>";
		
		foreach($col1 as $object)
		{
			$result = $result . HTML::link("partage/$object->slug",$object->name) . '<br>';
		}
		$result = $result . "</div>";
		
		$result = $result."<div class='col-md-3'>";
		foreach($col2 as $object)
		{
			$result = $result. HTML::link("partage/$object->slug",$object->name) . '<br>';
		}
		$result = $result."</div>";
		$result = $result."<div class='col-md-3'>";
		foreach($col3 as $object)
		{
			$result = $result. HTML::link("partage/$object->slug",$object->name) . '<br>';
		}
		$result = $result."</div>";
		$result = $result."<div class='col-md-3'>";
		foreach($col4 as $object)
		{
			$result = $result. HTML::link("partage/$object->slug",$object->name) . '<br>';
		}
		$result = $result."</div>";
			
		
		return $result;
		
		
		
	}

}
