<?php

class AdController extends BaseController {

	public function index()
	{
	}
	
	public function store()
	{
		$data = Input::all();
		$ad = new Ad();
		$ad->title = $data['title'];
		$ad->description = $data['description'];
		$ad->user_id = Auth::user()->id;
		$ad->category_id = $data['category_id'];
		$ad->save();
		return Redirect::route('ads.show',$ad->id);
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
