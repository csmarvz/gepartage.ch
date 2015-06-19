<?php

class SuggestionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	public function discard()
	{
		
		
	}
	
	public function validate()
	{
		$suggestion = Suggestion::find(Input::get('id'));
		$name = Input::get('name');
		$added = false;
		$message = "";
		
		if (isset($_POST['discard'])) {
			$suggestion->added = false;
			$message = "La suggestion ". $name . " a été écartée";
		} else {
			$existing_object = Object::where('slug','=',$name)->first();
			if ($existing_object) {
				$existing_object->name = $name;
				$existing_object->is_custom = 0;
				$existing_object->save();
				$message = $name . " existait déjà et a bien été rajouté à la base d'objets non custom !";
			} else {
				$object = new Object();
				$object->name = $name;
				$object->slug = Str::slug($object->name);
				$object->is_custom = 0;
				$object->save();
				$message = $name . " a bien été rajouté à la base !";
			}
			$added = true;	
		}

		$suggestion->processed = true;
		$suggestion->added = $added;
		$suggestion->save();
		
		return Redirect::to('')->with('success', $message);
	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$data = Input::all();
		
        $rules = array(
            'name' => 'required'
        );
        
        $messages = array(
            'name.required' => "N'oublie pas ta suggestion !"
        );

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails())
        {
            return Redirect::to(URL::previous())->withErrors($validator)->withInput();
        }
		
		$suggestion = new Suggestion();
		$suggestion->name = Input::get('name');
		$suggestion->user_id = Auth::id();
		$suggestion->processed = false;
		$suggestion->save();
		
		
		return Redirect::to('')->with('success',"Merci d'avoir suggéré ".$suggestion->name . ", nous allons traiter ta demande au plus vite !");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
