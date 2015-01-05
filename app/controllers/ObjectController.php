<?php

class ObjectController extends BaseController {

	public function index()
	{
	}
	
	public function store()
	{
		
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
	
	public function search()
	{
		
	}

}
