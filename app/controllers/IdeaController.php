<?php

class IdeaController extends BaseController {

	public function index()
	{
		$ideas = Idea::all();
		
		return View::make('idea.index', compact('ideas'));
	}
	
	public function store()
	{
		$idea = new Idea();
		$idea->text = Input::get('text');
		$idea->user_id = Auth::id();
		$idea->save();
		
		return Redirect::to('idees')->with('success',"Merci pour ta participation, ton idée a bien été rajouté !");
	}
	
	public function show($id)
	{
		$idea = Idea::find($id);
		return View::make('idea.show',compact('idea'));
	}
	public function edit()
	{
	}
	public function create()
	{
		Return View::make('idea.create');
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
