<?php

class AdController extends BaseController {

	public function index()
	{
	}
	
	public function store()
	{
		
		//$data = Input::all();
		$ad = new Ad();
		//$ad->title = $data['title'];
		//$ad->description = $data['description'];
		$ad->user_id = Auth::user()->id;
		$ad->object_id = Input::get('object_id');
		//$ad->category_id = $data['category_id'];
		$ad->save();
		return Redirect::to("")->with("success","Ton avis de recherche a été créé!");
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
		Return View::make('annonce');
	}
	public function update($id)
	{
	}
	public function destroy()
	{
	}

}
